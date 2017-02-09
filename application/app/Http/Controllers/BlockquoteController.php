<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Blockquote;
use App\Http\Requests;

class BlockquoteController extends Controller
{
  public function index()
  {
    $getblockquote = Blockquote::get();

    return view('backend/pages/kelolablockquote')->with('getblockquote', $getblockquote);
  }

  public function store(Request $request)
  {
    $file = $request->file('url_blockquote');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        $photo200 = $photo1[0]."_200x122.".$photo1[1];
        $photo80 = $photo1[0]."_80x81.".$photo1[1];

        Image::make($file)->fit(866,490)->save('images/'. $photo_name);
        Image::make($file)->fit(200,122)->save('images/'. $photo200);
        Image::make($file)->fit(80,81)->save('images/'. $photo80);

        $set = new Blockquote;
        $set->id_user = Auth::user()->id;
        $set->nama_blockquote = $request->nama_blockquote;
        $set->keterangan_blockquote = $request->keterangan_blockquote;
        $set->url_blockquote = $photo_name;
        $set->flag_blockquote = $request->flag_blockquote;
        $set->save();
    } else {
        $set = new Blockquote;
        $set->id_user = Auth::user()->id;
        $set->nama_blockquote = $request->nama_blockquote;
        $set->keterangan_blockquote = $request->keterangan_blockquote;
        $set->flag_blockquote = $request->flag_blockquote;
        $set->save();
    }

    return redirect()->route('blockquote.index')->with('message', 'Berhasil memasukkan blockquote baru.');
  }

  public function publish($id)
  {
    $set = Blockquote::find($id);
    if($set->flag_blockquote=="1") {
      $set->flag_blockquote = 0;
      $set->save();
    } elseif ($set->flag_blockquote=="0") {
      $set->flag_blockquote = 1;
      $set->save();
    }

    return redirect()->route('blockquote.index')->with('message', 'Berhasil mengubah status blockquote.');
  }

  public function bind($id)
  {
    $get = Blockquote::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    $file = $request->file('url_blockquote');
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

      $photo1 = explode('.', $photo_name);
      $photo200 = $photo1[0]."_200x122.".$photo1[1];
      $photo80 = $photo1[0]."_80x81.".$photo1[1];

      Image::make($file)->fit(866,490)->save('images/'. $photo_name);
      Image::make($file)->fit(200,122)->save('images/'. $photo200);
      Image::make($file)->fit(80,81)->save('images/'. $photo80);

      $set = Blockquote::find($request->id);
      $set->nama_blockquote = $request->nama_blockquote;
      $set->keterangan_blockquote = $request->keterangan_blockquote;
      $set->url_blockquote = $photo_name;
      $set->flag_blockquote = $request->flag_blockquote;
      $set->save();
    } else {
      $set = Blockquote::find($request->id);
      $set->nama_blockquote = $request->nama_blockquote;
      $set->keterangan_blockquote = $request->keterangan_blockquote;
      $set->flag_blockquote = $request->flag_blockquote;
      $set->save();
    }

    return redirect()->route('blockquote.index')->with('message', 'Berhasil mengubah konten blockquote.');
  }
  public function delete($id)
  {
    $set = Blockquote::find($id);
    $set->delete();

    return redirect()->route('blockquote.index')->with('message', 'Berhasil menghapus blockquote.');
  }
}
