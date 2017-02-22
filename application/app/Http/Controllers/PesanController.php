<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Pesan;
use App\Models\Tanggapan;
use App\Http\Requests;

class PesanController extends Controller
{
  public function index()
  {
    $getpesan = Pesan::get();
    return view('backend/pages/kelolapesan')->with('getpesan', $getpesan);
  }

  public function store(Request $request)
  {
    $set = new Pesan;
    $set->nama = $request->nama;
    $set->email = $request->email;
    $set->subject = $request->subject;
    $set->pesan = $request->pesan;
    $set->flag_pesan = 0;
    $set->save();

    return redirect()->route('pesan.index')->with('message', 'Berhasil memasukkan pesan baru.');
  }


  public function bind($id)
  {
    $get = Pesan::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    
      $set = Pesan::find($request->id);
      $set->id_user = Auth::user()->id;
      $set->flag_pesan = 1;
      $set->save();

      $set = new Tanggapan;
      $set->id_user = Auth::user()->id;
      $set->id_pesan = $request->id;
      $set->tanggapan = $request->tanggapan;
      $set->save();

    return redirect()->route('pesan.index')->with('message', 'Berhasil memberikan tanggapan.');
  }
  public function delete($id)
  {
    $set = Pesan::find($id);
    $set->delete();

    return redirect()->route('pesan.index')->with('message', 'Berhasil menghapus pesan.');
  }
}
