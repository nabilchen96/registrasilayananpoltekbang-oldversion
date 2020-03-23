<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Daftarlayanan;
use App\Peserta;
use App\Tagihan;
use DB;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function index(){
        $data = new Peserta();
        $data = DB::table('pesertas')
                ->join('daftarlayanans', 'daftarlayanans.iddaftar', '=', 'pesertas.iddaftar')
                ->join('users', 'users.id', '=', 'daftarlayanans.iduser')
                ->join('layanans', 'layanans.idlayanan', '=', 'daftarlayanans.idlayanan')
                ->select('layanans.*','daftarlayanans.*','pesertas.*')
                ->where('daftarlayanans.iduser', Auth::id())
                ->get();
        return view('peserta')->with('data', $data);
    }


    public function tambahpeserta(){
        $peserta = new Daftarlayanan();
        $peserta = DB::table('daftarlayanans')
                    ->join('users', 'users.id', '=', 'daftarlayanans.iduser')
                    ->join('layanans', 'layanans.idlayanan', '=', 'daftarlayanans.idlayanan')
                    ->select('layanans.*','daftarlayanans.*')
                    ->where('daftarlayanans.iduser', Auth::id())
                    ->get();
                
        return view('tambahpeserta')->with('peserta', $peserta);
    }

    public function prosestambahpeserta(Request $request){

        //mendapatkan semua jumlah peserta yang telah didaftarkan
        $jmlhpesertadipesertas = DB::table('pesertas')
                                    ->where('iddaftar', $request->input('iddaftar'))
                                    ->count();

        //jumlah peserta yang didaftarkan di daftarlayanan
        $jmlhpesertadilayanan = DB::table('daftarlayanans')
                                    ->where('iddaftar', $request->input('iddaftar'))
                                    ->select('jumlahpeserta')
                                    ->get();

        //jumlah kapasitas
        $jmlhkapasitas  = DB::table('kapasitas')
                            ->join('layanans','layanans.idlayanan','=','kapasitas.idlayanan')
                            ->join('daftarlayanans','daftarlayanans.idlayanan','=','layanans.idlayanan')
                            ->where('daftarlayanans.iddaftar', $request->input('iddaftar'))
                            ->get();
                                
        $psrta = '';
        foreach($jmlhpesertadilayanan as $jmlh){
            $psrta  = $jmlh->jumlahpeserta;
        }

        
        if($jmlhpesertadipesertas < $psrta){
            $data = new Peserta();
            $data->iddaftar     = $request->input('iddaftar');
            $data->nama         = $request->input('nama');
            $data->tempatlahir  = $request->input('tempatlahir');
            $data->tanggallahir = $request->input('tanggallahir');
            $data->alamat       = $request->input('alamat');
            $data->jeniskelamin = $request->input('jeniskelamin');
            $data->nik          = $request->input('nik');
            $data->email        = $request->input('email');
            $data->nohp         = $request->input('nohp');
            $data->ijazah       = $request->input('ijazah');
            $data->save();


            //mendapatkan semua jumlah peserta yang telah didaftarkan
            $jmlhpesertadipesertas = DB::table('pesertas')
                    ->where('iddaftar', $request->input('iddaftar'))
                    ->count();

            //jumlah peserta yang didaftarkan di daftarlayanan
            $jmlhpesertadilayanan = DB::table('daftarlayanans')
                    ->where('iddaftar', $request->input('iddaftar'))
                    ->select('jumlahpeserta')
                    ->get();

            //jumlah kapasitas
            $jmlhkapasitas  = DB::table('kapasitas')
            ->join('layanans','layanans.idlayanan','=','kapasitas.idlayanan')
            ->join('daftarlayanans','daftarlayanans.idlayanan','=','layanans.idlayanan')
            ->where('daftarlayanans.iddaftar', $request->input('iddaftar'))
            ->get();
                
            $psrta = '';
            foreach($jmlhpesertadilayanan as $jmlh){
            $psrta  = $jmlh->jumlahpeserta;
            }

            if($jmlhpesertadipesertas == $psrta){
                //menghitung tanggal jatuh tempo
                $tgl1 = date('Y-m-d');
                $tgl2 = date('Y-m-d', strtotime('+5 days', strtotime($tgl1)));

                //mendapatkan total tagihan
                $biayalayanan = DB::table('daftarlayanans')
                ->join('layanans','layanans.idlayanan','=','daftarlayanans.idlayanan')
                ->select('tarifpendaftaran','tarifseleksi','tarifdaftarulang','kategoriseleksi','jumlahpeserta')
                ->where('daftarlayanans.iddaftar', $request->input('iddaftar'))
                ->get();

                $tarifpendaftaran;
                $tarifseleksi;
                $tarifdaftarulang;
                $kategoriseleksi;
                $jumlah;

                foreach($biayalayanan as $biaya){
                $tarifpendaftaran   = $biaya->tarifpendaftaran;
                $tarifseleksi       = $biaya->tarifseleksi;
                $tarifdaftarulang   = $biaya->tarifdaftarulang;
                $kategoriseleksi    = $biaya->kategoriseleksi;
                $jumlah             = $biaya->jumlahpeserta;
                }

                $jumlahbayar = '';
                if($kategoriseleksi == 'tidak' or $kategoriseleksi == 'tidak ketat'){
                    $totalbialayanan = $tarifpendaftaran + $tarifseleksi + $tarifdaftarulang;
                    $jumlahbayar = $totalbialayanan * $jumlah;
                }else{
                    $totalbialayanan = $tarifpendaftaran + $tarifseleksi;
                    $jumlahbayar = $totalbialayanan * $jumlah;
                }

                $data = new Tagihan();
                $data->iddaftar = $request->input('iddaftar');
                $data->nopembayaran = $request->input('iddaftar').date('Ymd');
                $data->tgltagihan = date('Y-m-d');
                $data->tgljatuhtempo = date('Y-m-d');
                $data->status = 'belum lunas';
                $data->jumlahbayar = $jumlahbayar;
                $data->save();

                return redirect('emailtagihan/'.$request->input('iddaftar'));

                //return view('gagaltambahpeserta');
            }else{
                return redirect('tambahpeserta');
            }
        }else{
            return view('gagaltambahpeserta');            
        }
    }
}
