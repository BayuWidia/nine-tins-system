<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use DB;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaPengetahuanController extends Controller
{
  public function lihat()
  {
    if (Auth::user()->level=="1") {
      $getberita = Berita::leftjoin('kategori_berita', 'berita.id_kategori', '=', 'kategori_berita.id')
        ->join('users', 'users.id', '=', 'berita.id_user')
        ->where([
          ['kategori_berita.flag_utama', 6]
        ])
        ->select('berita.judul_berita', 'kategori_berita.nama_kategori', 'berita.created_at as tanggal_posting', 'users.name', 'users.email', 'berita.id as id_berita', 'berita.flag_publish', 'berita.flag_headline')
        ->orderby('berita.created_at', 'desc')
        ->get();
    } else {
      $getberita = Berita::join('kategori_berita', 'berita.id_kategori', '=', 'kategori_berita.id')
      ->join('users', 'users.id', '=', 'berita.id_user')
      ->where([
        ['berita.id_user', Auth::user()->id],
        ['kategori_berita.flag_utama', 6]
      ])
      ->select('berita.judul_berita', 'kategori_berita.nama_kategori', 'berita.created_at as tanggal_posting', 'users.name', 'users.email', 'berita.id as id_berita', 'berita.flag_publish', 'berita.flag_headline')
      ->orderby('berita.created_at', 'desc')
      ->get();
    }

    return view('backend/pages/lihatpengetahuan')->with('getberita', $getberita);
  }

  public function tambah()
  {
     $getkategori = KategoriBerita::where('flag_utama', 6)->get();

    return view('backend/pages/tambahpengetahuan')->with('getkategori', $getkategori);
  }

  public function store(Request $request)
  {
    $file = $request->file('url_foto');
    if ($file!=null) {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

      $photo1 = explode('.', $photo_name);
      // $photo250 = $photo1[0]."_250x150.".$photo1[1];
      // $photo570 = $photo1[0]."_570x291.".$photo1[1];
      // $photo395 = $photo1[0]."_395x237.".$photo1[1];
      // $photo100 = $photo1[0]."_100x70.".$photo1[1];
      // $photo80 = $photo1[0]."_80x80.".$photo1[1];
      // $photo810_426 = $photo1[0]."_810x426.".$photo1[1];
      // // $photo490 = $photo1[0]."_490x474.".$photo1[1];
      // $photo810_475 = $photo1[0]."_810x475.".$photo1[1];
      // $photo256 = $photo1[0]."_256x173.".$photo1[1];

      Image::make($file)->fit(472,270)->save('images/'. $photo_name);
      // Image::make($file)->fit(250,150)->save('images/'. $photo250);
      // Image::make($file)->fit(570,291)->save('images/'. $photo570);
      // Image::make($file)->fit(395,237)->save('images/'. $photo395);
      // Image::make($file)->fit(100,70)->save('images/'. $photo100);
      // Image::make($file)->fit(80,80)->save('images/'. $photo80);
      // Image::make($file)->fit(810,426)->save('images/'. $photo810_426);
      // // Image::make($file)->fit(490,474)->save('images/'. $photo490);
      // Image::make($file)->fit(810,475)->save('images/'. $photo810_475);
      // Image::make($file)->fit(256,173)->save('images/'. $photo256);

        $set = new Berita;
        $set->id_kategori = $request->id_kategori;

        $valheadline="";
        if($request->flag_headline=="") {
          $valheadline=0;
        } else {
          $valheadline=1;
        }

        $set->flag_headline = $valheadline;
        $set->id_user = Auth::user()->id;
        $set->url_foto = $photo_name;
        $set->judul_berita = $request->judul_berita;
        $set->tags = $request->tags;
        $set->isi_berita = $request->isi_berita;
        $set->save();
    } else {
        $set = new Berita;
        $set->id_kategori = $request->id_kategori;

        $valheadline="";
        if($request->flag_headline=="") {
          $valheadline=0;
        } else {
          $valheadline=1;
        }

        $set->flag_headline = $valheadline;
        $set->id_user = Auth::user()->id;
        $set->judul_berita = $request->judul_berita;
        $set->tags = $request->tags;
        $set->isi_berita = $request->isi_berita;
        $set->save();
    }


    return redirect()->route('pengetahuan.tambah')->with('message', 'Berhasil menambahkan konten berita baru.');
  }

  public function edit($id)
  {
    $editberita = Berita::find($id);

    $getkategori = KategoriBerita::where('flag_utama', 6)->get();

    return view('backend/pages/tambahpengetahuan')
      ->with('getkategori', $getkategori)
      ->with('editberita', $editberita);
  }

  public function update(Request $request)
  {
    $file = $request->file('url_foto');
    if ($file!=null) {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

      $photo1 = explode('.', $photo_name);
      // $photo250 = $photo1[0]."_250x150.".$photo1[1];
      // $photo570 = $photo1[0]."_570x291.".$photo1[1];
      // $photo395 = $photo1[0]."_395x237.".$photo1[1];
      // $photo100 = $photo1[0]."_100x70.".$photo1[1];
      // $photo80 = $photo1[0]."_80x80.".$photo1[1];
      // $photo810_426 = $photo1[0]."_810x426.".$photo1[1];
      // // $photo490 = $photo1[0]."_490x474.".$photo1[1];
      // $photo810_475 = $photo1[0]."_810x475.".$photo1[1];
      // $photo256 = $photo1[0]."_256x173.".$photo1[1];

      Image::make($file)->fit(472,270)->save('images/'. $photo_name);
      // Image::make($file)->fit(250,150)->save('images/'. $photo250);
      // Image::make($file)->fit(570,291)->save('images/'. $photo570);
      // Image::make($file)->fit(395,237)->save('images/'. $photo395);
      // Image::make($file)->fit(100,70)->save('images/'. $photo100);
      // Image::make($file)->fit(80,80)->save('images/'. $photo80);
      // Image::make($file)->fit(810,426)->save('images/'. $photo810_426);
      // // Image::make($file)->fit(490,474)->save('images/'. $photo490);
      // Image::make($file)->fit(810,475)->save('images/'. $photo810_475);
      // Image::make($file)->fit(256,173)->save('images/'. $photo256);

        $set = Berita::find($request->id);
        $set->id_kategori = $request->id_kategori;

        $valheadline="";
        if($request->flag_headline=="") {
          $valheadline=0;
        } else {
          $valheadline=1;
        }

        $set->flag_headline = $valheadline;
        $set->url_foto = $photo_name;
        $set->judul_berita = $request->judul_berita;
        $set->tags = $request->tags;
        $set->isi_berita = $request->isi_berita;
        $set->save();
    } else {
        $set = Berita::find($request->id);
        $set->id_kategori = $request->id_kategori;

        $valheadline="";
        if($request->flag_headline=="") {
          $valheadline=0;
        } else {
          $valheadline=1;
        }

        $set->flag_headline = $valheadline;
        $set->judul_berita = $request->judul_berita;
        $set->tags = $request->tags;
        $set->isi_berita = $request->isi_berita;
        $set->save();
    }

    return redirect()->route('pengetahuan.tambah')->with('message', 'Berhasil mengubah konten berita.');
  }

  public function flagpublish($id)
  {
    $set = Berita::find($id);
    if($set->flag_publish=="1") {
      $set->tanggal_publish = date('Y-m-d');
      $set->flag_publish = 0;
      $set->save();
    } elseif ($set->flag_publish=="0") {
      $set->tanggal_publish = date('Y-m-d');
      $set->flag_publish = 1;
      $set->save();
    }

    return redirect()->route('pengetahuan.lihat')->with('message', 'Berhasil mengubah status publikasi berita.');
  }

  public function headline()
  {

  }

  public function delete($id)
  {
    $set = Berita::find($id);
    $set->delete();

    return redirect()->route('pengetahuan.lihat')->with('message', 'Berhasil menghapus konten berita.');
  }

  public function preview($id)
  {
     $getberita = DB::table('berita')->leftJoin('kategori_berita','berita.id_kategori','=','kategori_berita.id')
                ->leftJoin('users','berita.id_user','=','users.id')
                ->select('*', 'berita.created_at')
                ->where('berita.id', $id)
                ->first();
    return view('backend/pages/previewkonten')->with('getberita', $getberita);
  }
}
