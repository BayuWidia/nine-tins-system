<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Lokasi;
use App\Models\Project;
use App\Http\Requests;

class LokasiController extends Controller
{
  public function index()
  {
    $getlokasi = Lokasi::get();
    return view('backend/pages/kelolalokasi')->with('getlokasi', $getlokasi);
  }

  public function store(Request $request)
  {
    // dd($request);
    $set = new Lokasi;
    $set->id_user = Auth::user()->id;
    $set->nama_lokasi = $request->nama_lokasi;
    $set->keterangan_lokasi = $request->keterangan_lokasi;
    $set->flag_lokasi = $request->flag_lokasi;
    $set->save();

    return redirect()->route('lokasi.index')->with('message', 'Berhasil memasukkan lokasi baru.');
  }

  public function publish($id)
  {
    $set = Lokasi::find($id);
    if($set->flag_lokasi=="1") {
      $set->flag_lokasi = 0;
      $set->save();
    } elseif ($set->flag_lokasi=="0") {
      $set->flag_lokasi = 1;
      $set->save();
    }

    return redirect()->route('lokasi.index')->with('message', 'Berhasil mengubah status lokasi.');
  }

  public function bind($id)
  {
    $get = Lokasi::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
      $set = Lokasi::find($request->id);
      $set->nama_lokasi = $request->nama_lokasi;
      $set->keterangan_lokasi = $request->keterangan_lokasi;
      $set->flag_lokasi = $request->flag_lokasi;
      $set->save();

    return redirect()->route('lokasi.index')->with('message', 'Berhasil mengubah konten lokasi.');
  }

  public function delete($id)
  {
    $check = Project::where('id_lokasi', $id)->first();
    if($check=="") {
      $set = Lokasi::find($id);
      $set->delete();
      return redirect()->route('lokasi.index')->with('message', 'Berhasil menghapus lokasi.');
    } else {
      return redirect()->route('lokasi.index')->with('messagefail', 'Gagal melakukan hapus data. Data telah memiliki relasi dengan data yang lain.');
    }
  }
}
