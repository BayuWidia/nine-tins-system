<?php

namespace App\Http\Controllers;


use DB;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\MasterSKPD;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

  public function show($id)
  {
    // SET VIEW COUNTER //
    $set = Berita::where('id_kategori', $id)
      ->orderby('updated_at', 'desc')->first();

    $setsave = Berita::find($set->id);
    if ($setsave->view_counter=="") {
      $setsave->view_counter = 1;
    } else {
      $setsave->view_counter = $set->view_counter+1;
    }
    $setsave->save();

    $getsekilastangerang = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id', 'berita.id_skpd as id_skpd_berita')
      ->where('berita.id_skpd', null)
      ->where('kategori_berita.flag_utama', 1)
      ->get();

    $getberita = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id')
      ->where('berita.id_skpd', null)
      ->where('kategori_berita.flag_utama', 0)
      ->get();

    $getdata = DB::table('kategori_berita')
      ->leftJoin('berita', 'kategori_berita.id','=','berita.id_kategori')
      ->Join('users', 'berita.id_user','=','users.id')
      ->select('*', 'kategori_berita.id', 'berita.id as id_berita', 'berita.id_skpd as id_skpd_berita')
      ->where('kategori_berita.id', $id)
      ->where('berita.flag_publish', '1')
      ->orderBy('berita.tanggal_publish')
      ->first();

    $getberitaterkait = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select('*', 'berita.id as id_berita')
      ->where('flag_utama', 0)
      ->where('flag_publish', 1)
      ->orderby(DB::raw('rand()'))
      ->limit(6)
      ->get();

    // GET KATEGORI FOR FOOTER //
    $getfooterkat = KategoriBerita::where('id_skpd', null)->get();

    // JEJARING //
    $getjejaring = MasterSKPD::where('flag_skpd', 1)->get();

    if ($getdata == null) {
        return view('errors.404');
    } else {
        return view('frontend.pages.detailkonten', compact('getjejaring', 'getfooterkat', 'getberitaterkait','getdata','getsekilastangerang', 'getberita'));
    }
  }

  public function showBerita($id)
  {
    // SET VIEW COUNTER //
    $set = Berita::find($id);
    if ($set->view_counter=="") {
      $set->view_counter = 1;
    } else {
      $set->view_counter = $set->view_counter+1;
    }
    $set->save();

    $getsekilastangerang = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id', 'berita.id_skpd as id_skpd_berita')
      ->where('berita.id_skpd', null)
      ->where('kategori_berita.flag_utama', 1)
      ->get();

    $getberita = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id', 'berita.id_skpd as id_skpd_berita')
      ->where('berita.id_skpd', null)
      ->where('kategori_berita.flag_utama', 0)
      ->get();

    $getdata = DB::table('kategori_berita')
      ->leftJoin('berita', 'kategori_berita.id','=','berita.id_kategori')
      ->Join('users', 'berita.id_user','=','users.id')
      ->select('*', 'kategori_berita.id', 'berita.id as id_berita', 'berita.id_skpd as id_skpd_berita', 'berita.url_foto as foto_berita')
      ->where('berita.id', $id)
      ->first();

      $getberitaterkait = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
        ->select('*', 'berita.id as id_berita')
        ->where('flag_utama', 0)
        ->where('flag_publish', 1)
        ->orderby(DB::raw('rand()'))
        ->limit(6)
        ->get();

    $getberitaterkait = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select('berita.url_foto', 'berita.judul_berita', 'kategori_berita.nama_kategori', 'berita.id as id_berita')
      ->where('id_kategori', $getdata->id_kategori)->limit(7)->get();

    // GET KATEGORI FOR FOOTER //
    $getfooterkat = KategoriBerita::where('id_skpd', null)->get();

    // JEJARING //
    $getjejaring = MasterSKPD::where('flag_skpd', 1)->get();


    if ($getdata == null) {
        return view('errors.404');
    } else {
        return view('frontend.pages.detailkonten', compact('getjejaring', 'getfooterkat', 'getdata','getsekilastangerang', 'getberita', 'getberitaterkait'));
    }
  }


  public function showskpd($id)
  {
    // SET VIEW COUNTER //
    $set = Berita::where('id_kategori', $id)
      ->orderby('updated_at', 'desc')->first();

    $setsave = Berita::find($set->id);
    if ($setsave->view_counter=="") {
      $setsave->view_counter = 1;
    } else {
      $setsave->view_counter = $set->view_counter+1;
    }
    $setsave->save();

    $getdata = DB::table('kategori_berita')
      ->leftJoin('berita', 'kategori_berita.id','=','berita.id_kategori')
      ->Join('users', 'berita.id_user','=','users.id')
      ->select('*', 'kategori_berita.id', 'berita.id as id_berita', 'berita.id_skpd as id_skpd_berita', 'berita.id_skpd as id_skpd_berita')
      ->where('kategori_berita.id', $id)
      ->where('berita.flag_publish', '1')
      ->orderBy('berita.tanggal_publish')
      ->first();

    $getsekilastangerang = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id', 'berita.id_skpd as id_skpd_berita')
      ->where('berita.id_skpd', $getdata->id_skpd_berita)
      ->where('kategori_berita.flag_utama', 1)
      ->get();

    $getberita = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select(DB::raw('distinct(kategori_berita.nama_kategori)'), 'kategori_berita.id', 'berita.id_skpd as id_skpd_berita')
      ->where('berita.id_skpd', $getdata->id_skpd_berita)
      ->where('kategori_berita.flag_utama', 0)
      ->get();

    $getberitaterkait = Berita::join('kategori_berita', 'kategori_berita.id', '=', 'berita.id_kategori')
      ->select('*', 'berita.id as id_berita')
      ->where('flag_utama', 0)
      ->where('flag_publish', 1)
      ->orderby(DB::raw('rand()'))
      ->limit(6)
      ->get();

    // GET KATEGORI FOR FOOTER //
    $getfooterkat = KategoriBerita::where('id_skpd', null)->get();

    // JEJARING //
    $getjejaring = MasterSKPD::where('flag_skpd', 1)->get();

    if ($getdata == null) {
        return view('errors.404');
    } else {
        return view('frontend.pages.detailkonten', compact('getjejaring', 'getfooterkat', 'getberitaterkait','getdata','getsekilastangerang', 'getberita'));
    }
  }

  public function geografi()
  {
    return view('frontend.pages.geografi');
  }

  public function demografi()
  {
    return view('frontend.pages.demografi');
  }
}
