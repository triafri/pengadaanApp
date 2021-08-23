<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import library Session
use Illuminate\Support\Facades\Session;

//import model M_Suplier
use App\M_Suplier;

//import model M_Pengadaan
use App\M_Pengadaan;

class Home extends Controller
{
    //function index

    public function index(){
      //echo "Hello World (Fungsi Index)";
      //return view ('home'); //panggil dari folder view

      $token = Session::get('token');

      $tokenDb = M_Suplier::where('token', $token)->count();

      if($tokenDb > 0){
        $data['token'] = $token;
      }else{
        $data['token'] = "kosong";
      }

      $data['pengadaan'] = M_Pengadaan::where('status','1')->paginate(15);

      return view ('utama.home', $data); //pemanggilan view dari subfolder
    }
}
