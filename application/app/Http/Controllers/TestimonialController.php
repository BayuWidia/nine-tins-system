<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Testimonial;
use App\Http\Requests;

class TestimonialController extends Controller
{
  public function index()
  {
    $gettestimonial = Testimonial::get();

    return view('backend/pages/kelolatestimonial')->with('gettestimonial', $gettestimonial);
  }

  public function store(Request $request)
  {
    $file = $request->file('url_testimonial');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        $photo200 = $photo1[0]."_200x122.".$photo1[1];
        $photo80 = $photo1[0]."_80x81.".$photo1[1];

        Image::make($file)->fit(866,490)->save('images/'. $photo_name);
        Image::make($file)->fit(200,122)->save('images/'. $photo200);
        Image::make($file)->fit(80,81)->save('images/'. $photo80);

        $set = new Testimonial;
        $set->id_user = Auth::user()->id;
        $set->nama_testimonial = $request->nama_testimonial;
        $set->keterangan_testimonial = $request->keterangan_testimonial;
        $set->url_testimonial = $photo_name;
        $set->flag_testimonial = $request->flag_testimonial;
        $set->save();
    } else {
        $set = new Testimonial;
        $set->id_user = Auth::user()->id;
        $set->nama_testimonial = $request->nama_testimonial;
        $set->keterangan_testimonial = $request->keterangan_testimonial;
        $set->flag_testimonial = $request->flag_testimonial;
        $set->save();
    }

    return redirect()->route('testimonial.index')->with('message', 'Berhasil memasukkan testimonial baru.');
  }

  public function publish($id)
  {
    $set = Testimonial::find($id);
    if($set->flag_testimonial=="1") {
      $set->flag_testimonial = 0;
      $set->save();
    } elseif ($set->flag_testimonial=="0") {
      $set->flag_testimonial = 1;
      $set->save();
    }

    return redirect()->route('testimonial.index')->with('message', 'Berhasil mengubah status testimonial.');
  }

  public function bind($id)
  {
    $get = Testimonial::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    $file = $request->file('url_testimonial');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

      $photo1 = explode('.', $photo_name);
      $photo200 = $photo1[0]."_200x122.".$photo1[1];
      $photo80 = $photo1[0]."_80x81.".$photo1[1];

      Image::make($file)->fit(866,490)->save('images/'. $photo_name);
      Image::make($file)->fit(200,122)->save('images/'. $photo200);
      Image::make($file)->fit(80,81)->save('images/'. $photo80);

      $set = Testimonial::find($request->id);
      $set->nama_testimonial = $request->nama_testimonial;
      $set->keterangan_testimonial = $request->keterangan_testimonial;
      $set->url_testimonial = $photo_name;
      $set->flag_testimonial = $request->flag_testimonial;
      $set->save();
    } else {
      $set = Testimonial::find($request->id);
      $set->nama_testimonial = $request->nama_testimonial;
      $set->keterangan_testimonial = $request->keterangan_testimonial;
      $set->flag_testimonial = $request->flag_testimonial;
      $set->save();
    }

    return redirect()->route('testimonial.index')->with('message', 'Berhasil mengubah konten testimonial.');
  }
  public function delete($id)
  {
    $set = Testimonial::find($id);
    $set->delete();

    return redirect()->route('testimonial.index')->with('message', 'Berhasil menghapus testimonial.');
  }
}
