<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagihan;
use App\Layanan;
use App\Daftarlayanan;
use Auth;

class TagihanController extends Controller
{
    public function index(){
        $tagihan = Tagihan::get();
        $daftarlayanan = Daftarlayanan::get();
        $layanan = Layanan::get();
        return view('tagihan',compact('tagihan','daftarlayanan','layanan')); 
    }
}
