<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\KategoriProject;
use App\Models\Project;
use App\Http\Requests;

class KategoriProjectController extends Controller
{
  public function index()
  {
    $getkategoriproject = KategoriProject::get();
    return view('backend/pages/kategoriproject')->with('getkategoriproject', $getkategoriproject);
  }

  public function store(Request $request)
  {
    // dd($request);
    $set = new KategoriProject;
    $set->id_user = Auth::user()->id;
    $set->nama_kategori_project = $request->nama_kategori_project;
    $set->keterangan_kategori_project = $request->keterangan_kategori_project;
    $set->flag_kategori_project = $request->flag_kategori_project;
    $set->save();

    return redirect()->route('project.kategori.index')->with('message', 'Berhasil memasukkan Kategori Project baru.');
  }

  public function publish($id)
  {
    $set = KategoriProject::find($id);
    if($set->flag_kategori_project=="1") {
      $set->flag_kategori_project = 0;
      $set->save();
    } elseif ($set->flag_kategori_project=="0") {
      $set->flag_kategori_project = 1;
      $set->save();
    }

    return redirect()->route('project.kategori.index')->with('message', 'Berhasil mengubah status Kategori Project.');
  }

  public function bind($id)
  {
    $get = KategoriProject::find($id);
    return $get;
  }

  public function edit(Request $request)
  {
      $set = KategoriProject::find($request->id);
      $set->nama_kategori_project = $request->nama_kategori_project;
      $set->keterangan_kategori_project = $request->keterangan_kategori_project;
      $set->flag_kategori_project = $request->flag_kategori_project;
      $set->save();

    return redirect()->route('project.kategori.index')->with('message', 'Berhasil mengubah konten Kategori Project.');
  }

  public function delete($id)
  {
    $check = Project::where('id_kategori_project', $id)->first();
    if($check=="") {
      $set = KategoriProject::find($id);
      $set->delete();
      return redirect()->route('project.kategori.index')->with('message', 'Berhasil menghapus Kategori Project.');
    } else {
      return redirect()->route('project.kategori.index')->with('messagefail', 'Gagal melakukan hapus data. Data telah memiliki relasi dengan data yang lain.');
    }
  }
}
