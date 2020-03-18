<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\Daftarlayanan;
use App\Tagihan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    public function index(){
        $data = new Layanan();
        $data = $data->get();
        return view('layanan')->with('data',$data);
    }

    public function prosesdaftarlayanan(Request $request){
        $data = new Daftarlayanan();
        $data->idlayanan = $request->input('idlayanan');
        $data->jumlahpeserta = $request->input('jumlah');
        $data->idkapasitas = $request->input('idjadwal');
        $data->iduser = Auth::check();
        $data->save();

        //mendapatkan iddaftar paling akhir
        $id = '';
        $iddaftar = DB::table('daftarlayanans')
                    ->latest('iddaftar')
                    ->get();
        foreach($iddaftar as $id){
            $id = $id->iddaftar;
        }

        //menghitung tanggal jatuh temp
        $tgl1 = date('Y-m-d');
        $tgl2 = date('Y-m-d', strtotime('+5 days', strtotime($tgl1)));


        //mendapatkan total tagihan
        $biayalayanan = DB::table('layanans')
                        ->select('tarifpendaftaran','tarifseleksi','tarifdaftarulang','kategoriseleksi')
                        ->where('idlayanan', $request->input('idlayanan'))
                        ->get();

        $tarifpendaftaran;
        $tarifseleksi;
        $tarifdaftarulang;
        $kategoriseleksi;

        foreach($biayalayanan as $biaya){
            $tarifpendaftaran   = $biaya->tarifpendaftaran;
            $tarifseleksi       = $biaya->tarifseleksi;
            $tarifdaftarulang   = $biaya->tarifdaftarulang;
            $kategoriseleksi    = $biaya->kategoriseleksi;
        }
        

        $jumlahbayar = '';
        if($kategoriseleksi == 'tidak' or $kategoriseleksi == 'tidak ketat'){
            $totalbialayanan = $tarifpendaftaran + $tarifseleksi + $tarifdaftarulang;
            $jumlahbayar = $totalbialayanan * $request->input('jumlah');
        }else{
            $totalbialayanan = $tarifpendaftaran + $tarifseleksi;
            $jumlahbayar = $totalbialayanan * $request->input('jumlah');
        }

        $data = new Tagihan();
        $data->iddaftar = $id;
        $data->nopembayaran = '999';
        $data->tgltagihan = date('Y-m-d');
        $data->tgljatuhtempo = $tgl2;
        $data->status = 'belum lunas';
        $data->jumlahbayar = $jumlahbayar;
        $data->save();
        
        return redirect('tambahpeserta');
    }
}
