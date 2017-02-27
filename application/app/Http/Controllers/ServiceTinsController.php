<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\About;
use App\Http\Requests;

class ServiceTinsController extends Controller
{
  public function index()
  {
    $getservice = About::select('*')->where('flag_tentang', 2)->first();
    // dd($getabout);
    return view('backend/pages/kelolaservicetins', compact('getservice'));
  }

  public function store(Request $request)
  {
    // dd($request);
    $file = $request->file('url_tentang');
    $photo_name = "";
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        $photo200 = $photo1[0]."_200x122.".$photo1[1];
        $photo495 = $photo1[0]."_495x298.".$photo1[1];

        Image::make($file)->save('images/'. $photo_name);
        Image::make($file)->fit(495,298)->save('images/'. $photo495);
    } 

    $set = new About;
    $set->id_user = Auth::user()->id;
    $set->nama_tentang = $request->nama_tentang;
    $set->keterangan_tentang = $request->keterangan_tentang;
    $set->flag_tentang = 2;
    $set->url_tentang = $photo_name;
    $set->save();

    return redirect()->route('service.tins.index')->with('message', 'Berhasil memasukkan service baru.');
  }

  public function bind($id)
  {
    $get = About::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    // dd($request);
    $file = $request->file('url_tentang');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        $photo200 = $photo1[0]."_200x122.".$photo1[1];
        $photo495 = $photo1[0]."_495x298.".$photo1[1];

        Image::make($file)->save('images/'. $photo_name);
        Image::make($file)->fit(495,298)->save('images/'. $photo495);

      $set = About::find($request->id);
      $set->nama_tentang = $request->nama_tentang;
      $set->keterangan_tentang = $request->keterangan_tentang;
      $set->flag_tentang = 2;
      $set->url_tentang = $photo_name;
      $set->save();
    } else {
      $set = About::find($request->id);
      $set->nama_tentang = $request->nama_tentang;
      $set->keterangan_tentang = $request->keterangan_tentang;
      $set->flag_tentang = 2;
      $set->save();
    }

    return redirect()->route('service.tins.index')->with('message', 'Berhasil mengubah konten service.');
  }
  
  public function delete($id)
  {
    $set = About::find($id);
    $set->delete();

    return redirect()->route('service.tins.index')->with('message', 'Berhasil menghapus service.');
  }
}
