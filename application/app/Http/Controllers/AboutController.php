<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\About;
use App\Http\Requests;

class AboutController extends Controller
{
  public function index()
  {
    $getabout = About::select('*')->first();
    // dd($getabout);
    return view('backend/pages/kelolaabout', compact('getabout'));
  }

  public function store(Request $request)
  {
    // dd($request);
    $set = new About;
    $set->id_user = Auth::user()->id;
    $set->nama_tentang = $request->nama_tentang;
    $set->keterangan_tentang = $request->keterangan_tentang;
    $set->flag_tentang = $request->flag_tentang;
    $set->save();

    return redirect()->route('about.index')->with('message', 'Berhasil memasukkan about baru.');
  }

  public function publish($id)
  {
    $set = About::find($id);
    if($set->flag_tentang=="1") {
      $set->flag_tentang = 0;
      $set->save();
    } elseif ($set->flag_tentang=="0") {
      $set->flag_tentang = 1;
      $set->save();
    }

    return redirect()->route('about.index')->with('message', 'Berhasil mengubah status about.');
  }

  public function bind($id)
  {
    $get = About::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
      $set = About::find($request->id);
      $set->nama_tentang = $request->nama_tentang;
      $set->keterangan_tentang = $request->keterangan_tentang;
      $set->flag_tentang = $request->flag_tentang;
      $set->save();

    return redirect()->route('about.index')->with('message', 'Berhasil mengubah konten about.');
  }
  
  public function delete($id)
  {
    $set = About::find($id);
    $set->delete();

    return redirect()->route('about.index')->with('message', 'Berhasil menghapus about.');
  }
}
