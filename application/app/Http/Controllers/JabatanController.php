<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Jabatan;
use App\Models\User;
use App\Http\Requests;

class JabatanController extends Controller
{
  public function index()
  {
    $getjabatan = Jabatan::get();
    return view('backend/pages/kelolajabatan')->with('getjabatan', $getjabatan);
  }

  public function store(Request $request)
  {
    // dd($request);
    $set = new Jabatan;
    $set->nama_jabatan = $request->nama_jabatan;
    $set->keterangan_jabatan = $request->keterangan_jabatan;
    $set->flag_jabatan = $request->flag_jabatan;
    $set->save();

    return redirect()->route('jabatan.index')->with('message', 'Berhasil memasukkan jabatan baru.');
  }

  public function publish($id)
  {
    $set = Jabatan::find($id);
    if($set->flag_jabatan=="1") {
      $set->flag_jabatan = 0;
      $set->save();
    } elseif ($set->flag_jabatan=="0") {
      $set->flag_jabatan = 1;
      $set->save();
    }

    return redirect()->route('jabatan.index')->with('message', 'Berhasil mengubah status jabatan.');
  }

  public function bind($id)
  {
    $get = Jabatan::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
      $set = Jabatan::find($request->id);
      $set->nama_jabatan = $request->nama_jabatan;
      $set->keterangan_jabatan = $request->keterangan_jabatan;
      $set->flag_jabatan = $request->flag_jabatan;
      $set->save();

    return redirect()->route('jabatan.index')->with('message', 'Berhasil mengubah konten jabatan.');
  }
  public function delete($id)
  {
    $check = User::where('id_jabatan', $id)->first();
    if($check=="") {
      $set = Jabatan::find($id);
      $set->delete();
      return redirect()->route('jabatan.index')->with('message', 'Berhasil menghapus jabatan.');
    } else {
      return redirect()->route('jabatan.index')->with('messagefail', 'Gagal melakukan hapus data. Data telah memiliki relasi dengan data yang lain.');
    }
  }
}
