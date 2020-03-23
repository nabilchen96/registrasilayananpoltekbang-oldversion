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
        
        return redirect('tambahpeserta');
    }
}
