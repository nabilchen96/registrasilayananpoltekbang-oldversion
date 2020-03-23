<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagihan;
use App\Layanan;
use App\Daftarlayanan;
use Auth;
use App\Mail\TagihanEmail;
use Illuminate\Support\Facades\Mail;
use DB;

class TagihanController extends Controller
{
    public function index(){
        $tagihan = Tagihan::get();
        $daftarlayanan = Daftarlayanan::get();
        $layanan = Layanan::get();
        return view('tagihan',compact('tagihan','daftarlayanan','layanan')); 
    }

    public function kirimtagihan($id){
        $email = DB::table('daftarlayanans')
                ->join('users','users.id','=','daftarlayanans.iduser')
                ->where('daftarlayanans.iddaftar', $id)
                ->select('users.email')
                ->get();
        
        $mail = '';
        foreach($email as $e){
            $mail = $e->email;
        }

        // var_dump($email);

        Mail::to($mail)->send(new TagihanEmail());

        return redirect('tagihan');

    }

    public function detailtagihan($id){
        $tagihan = DB::table('tagihans')
                    ->join('daftarlayanans','daftarlayanans.iddaftar','=','tagihans.iddaftar')
                    ->join('layanans','layanans.idlayanan','=','daftarlayanans.idlayanan')
                    ->join('users','users.id','=','daftarlayanans.iduser')
                    ->where('tagihans.idtagihan', $id)
                    ->get();

        return view('detailtagihan')->with('tagihan',$tagihan);
    }
}
