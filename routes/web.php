<?php

Route::get('/','Home@index');
//route registrasi
Route::get('/registrasi','Registrasi@index');
//route simpan data registrasi
Route::post('/regis','Registrasi@regis');
//route ke halaman login Suplier
Route::get('/login', 'Suplier@login');
//
Route::post('/masukSuplier', 'Suplier@masukSuplier');
//route keluar admin suplier
Route::get('/suplierKeluar', 'Suplier@suplierKeluar');
//
Route::get('/masukAdmin', 'Admin@index');
//route ke halaman admin
Route::post('/loginAdmin', 'Admin@loginAdmin');
//route masuk ke halaman Pengajuan
Route::get('/pengajuan', 'Pengajuan@pengajuan');
//
Route::get('/keluarAdmin', 'Admin@keluarAdmin');
//
Route::get('/listAdmin', 'Admin@listAdmin');
//Route tambah admin
Route::post('/tambahAdmin', 'Admin@tambahAdmin');
//Route update data admin
Route::post('/ubahAdmin', 'Admin@ubahAdmin');
//Route untuk hapus data admin
Route::get('/hapusAdmin/{id}', 'Admin@hapusAdmin');
//Route untuk panggil view list Pengadaan
Route::get('/listPengadaan', 'Pengadaan@index');
//Route tambah pengadaan
Route::post('/tambahPengadaan', 'Pengadaan@tambahPengadaan');
//Route untuk hapus data gambar
Route::get('/hapusGambar/{id}', 'Pengadaan@hapusGambar');
//Route upload gambar
Route::post('/uploadGambar', 'Pengadaan@uploadGambar');
//Route untuk hapus data pengadaan
Route::get('/hapusPengadaan/{id}', 'Pengadaan@hapusPengadaan');
//Route update data pengadaan
Route::post('/ubahPengadaan', 'Pengadaan@ubahPengadaan');
//Route untuk ke halaman list suplier
Route::get('/listSuplier', 'Pengadaan@listSuplier');
//Route untuk melakukan pengajuan(tambah pengajuan)
Route::post('/tambahPengajuan', 'Pengajuan@tambahPengajuan');
//Route untuk terima pengajuan
Route::get('/terimaPengajuan/{id}', 'Pengajuan@terimaPengajuan');
//Route untuk tolak pengajuan
Route::get('/tolakPengajuan/{id}', 'Pengajuan@tolakPengajuan');
//Route untuk menmpilkan halaman riwayat pengajuan
Route::get('/riwayat', 'Pengajuan@riwayat');
//Route upload laporan
Route::post('/tambahLaporan', 'Pengajuan@tambahLaporan');
//Route untuk menmpilkan halaman laporan untuk admin
Route::get('/laporan', 'Pengajuan@laporan');
//Route untuk selesai pengajuan admin
Route::get('/selesaiPengajuan/{id}', 'Pengajuan@selesaiPengajuan');
//Route untuk selesai pengajuan suplier
Route::get('/pengajuanSelesai', 'Pengajuan@pengajuanSelesai');
//Route untuk tolak laporan admin
Route::get('/tolakLaporan/{id}', 'Pengajuan@tolakLaporan');
//Route untuk menampilkan data Suplier di halaman admin
Route::get('/listSup', 'Suplier@listSup');
//Route untuk fungsi menonaktifkan suplier
Route::get('/nonAktif/{id}', 'Suplier@nonAktif');
//Route untuk fungsi mengaktifkan suplier
Route::get('/aktif/{id}', 'Suplier@aktif');
//Route untuk memanggil fungsi ubah password suplier
Route::post('/ubahPasswordSuplier', 'Suplier@ubahPasswordSuplier');
//Route untuk memanggil fungsi ubah password admin
Route::post('/ubahPasswordAdmin', 'Admin@ubahPasswordAdmin');
