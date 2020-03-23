<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;

class PenyewaanController extends Controller
{
    public function index(){
        return view('penyewaan');
    }
}
