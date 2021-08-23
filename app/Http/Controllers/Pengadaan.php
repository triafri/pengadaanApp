<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import library Session
use Illuminate\Support\Facades\Session;

//import lib JWT
use \Firebase\JWT\JWT;

//import Lib Response
use Illuminate\Response;

//import library validasi
use Illuminate\Support\Facades\Validator;

//import fungsi encrypt
use Illuminate\Contracts\Encryption\DecrypException;

//import library Storage
use Illuminate\Support\Facades\Storage;

//import model admin
use App\M_Admin;

//import model pengadaan
use App\M_Pengadaan;

//import model suplier
use App\M_Suplier;

class Pengadaan extends Controller
{
    //
    public function index(){
      $token = Session::get('token');

      $tokenDb = M_Admin::where('token',$token)->count();
      if($tokenDb > 0){
        $data['adm'] = M_Admin::where('token',$token)->first();

        $data['pengadaan'] = M_Pengadaan::where('status','1')->paginate(15);
        return view('pengadaan.list', $data);
      }else{
        return redirect('/masukAdmin')->with('gagal','Anda sudah logout, Silahkan Login Kembali');
      }
    }

    public function tambahPengadaan(Request $request){
      $token = Session::get('token');
      $tokenDb = M_Admin::where('token',$token)->count();
      if($tokenDb > 0){
        $this->validate($request,
          [
            'nama_pengadaan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:10000',
            'anggaran' => 'required'
          ]
        );

        $path = $request->file('gambar')->store('public/gambar');

        if(M_Pengadaan::create([
          "nama_pengadaan" => $request->nama_pengadaan,
          "deskripsi" => $request->deskripsi,
          "gambar" => $path,
          "anggaran" => $request->anggaran
          ])){
            return redirect('/listPengadaan')->with('berhasil','Data berhasil disimpan');
        }else{
          return redirect('/listPengadaan')->with('gagal','Data gagal disimpan');
        }

      }else{
        return redirect('/masukAdmin')->with('gagal','Anda sudah logout, Silahkan Login Kembali');
      }
    }

    public function hapusGambar($id){
      $token = Session::get('token');
      $tokenDb = M_Admin::where('token',$token)->count();

      if($tokenDb > 0){
        $pengadaan = M_Pengadaan::where('id_pengadaan', $id)->count();
        if($pengadaan > 0){
          $dataPengadaan = M_Pengadaan::where('id_pengadaan', $id)->first();

          if(Storage::delete($dataPengadaan->gambar)){
            if(M_Pengadaan::where('id_pengadaan',$id)->update(["gambar" => "-"])){
              return redirect('/listPengadaan')->with('berhasil','Gambar berhasil dihapus');
            }else{
              return redirect('/listPengadaan')->with('gagal','Gambar gagal dihapus');
            }
          }else{
            return redirect('/listPengadaan')->with('gagal','Gambar gagal dihapus');
          }
        }else{
          return redirect('/listPengadaan')->with('gagal','Data tidak ditemukan');
        }
      }else{
        return redirect('/masukAdmin')->with('gagal','Anda sudah logout, Silahkan Login Kembali');
      }
    }

    public function uploadGambar(Request $request){
      $token = Session::get('token');
      $tokenDb = M_Admin::where('token',$token)->count();
      if($tokenDb > 0){
        $this->validate($request,
          [
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:10000',
          ]
        );

        $path = $request->file('gambar')->store('public/gambar');

        if(M_Pengadaan::where('id_pengadaan', $request->id_pengadaan)->update([
          "gambar" => $path,
          ])){
            return redirect('/listPengadaan')->with('berhasil','Data berhasil disimpan');
        }else{
          return redirect('/listPengadaan')->with('gagal','Data gagal disimpan');
        }

      }else{
        return redirect('/masukAdmin')->with('gagal','Anda sudah logout, Silahkan Login Kembali');
      }
    }

    public function hapusPengadaan($id){
      $token = Session::get('token');
      $tokenDb = M_Admin::where('token',$token)->count();

      if($tokenDb > 0){
        $pengadaan = M_Pengadaan::where('id_pengadaan', $id)->count();
        if($pengadaan > 0){
          $dataPengadaan = M_Pengadaan::where('id_pengadaan', $id)->first();

          if(Storage::delete($dataPengadaan->gambar)){
            if(M_Pengadaan::where('id_pengadaan',$id)->delete()){
              return redirect('/listPengadaan')->with('berhasil','Data berhasil dihapus');
            }else{
              return redirect('/listPengadaan')->with('gagal','Data gagal dihapus');
            }
          }else{
            return redirect('/listPengadaan')->with('gagal','Data gagal dihapus');
          }
        }else{
          return redirect('/listPengadaan')->with('gagal','Data tidak ditemukan');
        }
      }else{
        return redirect('/masukAdmin')->with('gagal','Anda sudah logout, Silahkan Login Kembali');
      }
    }

    public function ubahPengadaan(Request $request){
      $token = Session::get('token');
      $tokenDb = M_Admin::where('token',$token)->count();
      if($tokenDb > 0){
        $this->validate($request,
          [
            'u_nama_pengadaan' => 'required',
            'u_deskripsi' => 'required',
            'u_anggaran' => 'required'
          ]
        );

        if(M_Pengadaan::where('id_pengadaan', $request->id_pengadaan)->update([
          "nama_pengadaan" => $request->u_nama_pengadaan,
          "deskripsi" => $request->u_deskripsi,
          "anggaran" => $request->u_anggaran
          ])){
            return redirect('/listPengadaan')->with('berhasil','Data berhasil diubah');
        }else{
          return redirect('/listPengadaan')->with('gagal','Data gagal diubah');
        }

      }else{
        return redirect('/masukAdmin')->with('gagal','Anda sudah logout, Silahkan Login Kembali');
      }
    }

    public function listSuplier(){
      $token = Session::get('token');

      $tokenDb = M_Suplier::where('token',$token)->count();
      if($tokenDb > 0){

        $data['sup'] = M_Suplier::where('token',$token)->first();

        $data['pengadaan'] = M_Pengadaan::where('status','1')->paginate(15);
        return view('login_sup.pengadaan', $data);
      }else{
        return redirect('/login')->with('gagal','Password anda salah');
      }
    }


}
