<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Skill;
use App\Http\Requests;

class SkillController extends Controller
{
  public function index()
  {
    $getskill = Skill::get();
    return view('backend/pages/kelolaskill')->with('getskill', $getskill);
  }

  public function store(Request $request)
  {
    $file = $request->file('url_keahlian');
    $photo_name = "";
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        $photo200 = $photo1[0]."_200x122.".$photo1[1];
        $photo80 = $photo1[0]."_80x85.".$photo1[1];

        Image::make($file)->fit(866,490)->save('images/'. $photo_name);
        Image::make($file)->fit(80,85)->save('images/'. $photo80);
    } 

    $set = new Skill;
    $set->id_user = Auth::user()->id;
    $set->nama_keahlian = $request->nama_skill;
    $set->keterangan_keahlian = $request->keterangan_skill;
    $set->persentase = $request->persentase;
    $set->flag_keahlian = $request->flag_skill;
    $set->url_keahlian = $photo_name;
    $set->save();

    return redirect()->route('skill.index')->with('message', 'Berhasil memasukkan skill baru.');
  }

  public function publish($id)
  {
    $set = Skill::find($id);
    if($set->flag_keahlian=="1") {
      $set->flag_keahlian = 0;
      $set->save();
    } elseif ($set->flag_keahlian=="0") {
      $set->flag_keahlian = 1;
      $set->save();
    }

    return redirect()->route('skill.index')->with('message', 'Berhasil mengubah status skill.');
  }

  public function bind($id)
  {
    $get = Skill::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
    $file = $request->file('url_keahlian');
    $photo_name = "";
    if($file!="") {
      $photo_name = time(). '.' . $file->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name);
        $photo200 = $photo1[0]."_200x122.".$photo1[1];
        $photo80 = $photo1[0]."_80x85.".$photo1[1];

        Image::make($file)->fit(866,490)->save('images/'. $photo_name);
        Image::make($file)->fit(80,85)->save('images/'. $photo80);
    }
      $set = Skill::find($request->id);
      $set->nama_keahlian = $request->nama_skill;
      $set->keterangan_keahlian = $request->keterangan_skill;
      $set->persentase = $request->persentase;
      $set->flag_keahlian = $request->flag_skill;
      $set->url_keahlian = $photo_name;
      $set->save();

    return redirect()->route('skill.index')->with('message', 'Berhasil mengubah konten skill.');
  }
  public function delete($id)
  {
    $set = Skill::find($id);
    $set->delete();

    return redirect()->route('skill.index')->with('message', 'Berhasil menghapus skill.');
  }
}
