<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import library validasi
use Illuminate\Support\Facades\Validator;

//import library Session
use Illuminate\Support\Facades\Session;

//import fungsi encrypt
use Illuminate\Contracts\Encryption\DecrypException;

//import model M_Suplier
use App\M_Suplier;

class Registrasi extends Controller
{
    //
    public function index(){
      $token = Session::get('token');

      $tokenDb = M_Suplier::where('token', $token)->count();

      if($tokenDb > 0){
        $data['token'] = $token;
      }else{
        $data['token'] = "kosong";
      }

      return view('registrasi.registrasi', $data);
    }

    public function regis(Request $request){

      $this->validate($request,
        [
          //validasi inputan (name) pada view registrasi
          'nama_usaha' => 'required',
          'email' => 'required',
          'alamat' => 'required',
          'npwp' => 'required',
          'password' => 'required'
        ]
      );

      if(M_Suplier::create(
        [
          //nama field tbl_suplier => $request->nama inputan di view
          'nama_usaha' => $request->nama_usaha,
          'email' => $request->email,
          'alamat' => $request->alamat,
          'no_npwp' => $request->npwp,
          'password' => encrypt($request->password)
        ]

      )){
        return redirect('/registrasi')->with('berhasil','Data berhasil disimpan');
      }else{
        return redirect('/registrasi')->with('gagal','Data gagal disimpan');
      }

    }
}
