<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Client;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\KategoriProject;
use App\Models\Project;
use App\Http\Requests;

class ProjectController extends Controller
{
  public function lihat()
  {
    $getproject = Project::get();
    
    return view('backend/pages/lihatproject')->with('getproject', $getproject);
  }

  public function tambah()
  {
    $getproject = Project::get();
    $getclient = Client::where('flag_client', '1')->get();
    $getlokasi = Lokasi::where('flag_lokasi', '1')->get();
    $getkategoriproject = KategoriProject::where('flag_kategori_project', '1')->get();
    // dd($getclient);
    return view('backend/pages/tambahproject')
    ->with('getproject', $getproject)
    ->with('getclient', $getclient)
    ->with('getlokasi', $getlokasi)
    ->with('getkategoriproject', $getkategoriproject);
  }

  public function store(Request $request)
  {
    $logoProject = $request->file('logo_project');

    if ($logoProject!=null) {
      $photo_name_logo = time(). '.' . $logoProject->getClientOriginalExtension();

      $photo2 = explode('.', $photo_name_logo);
      $photo130_2 = $photo2[0]."_130x50.".$photo2[1];
      $photo261_2 = $photo2[0]."_261x269.".$photo2[1];
      $photo552_2 = $photo2[0]."_552x577.".$photo2[1];
      
      Image::make($logoProject)->fit(472,270)->save('images/'. $photo_name_logo);
      Image::make($file)->fit(130,50)->save('images/'. $photo130_2);
      Image::make($file)->fit(261,269)->save('images/'. $photo261_2);
      Image::make($file)->fit(552,577)->save('images/'. $photo552_2);

        $set = new Project;
        $set->id_user = Auth::user()->id;
        $set->id_lokasi = $request->id_lokasi;
        $set->id_kategori_project = $request->id_kategori_project;
        $set->id_client = $request->id_client;
        $set->nama_project = $request->nama_project;
        $set->keterangan_project = $request->keterangan_project;
        $set->waktu_project = $request->waktu_project;
        $set->status_project = $request->status_project;
        $set->logo_project = $photo_name_logo;
        $set->tags = $request->tags;
        $set->harga_project = $request->harga_project;
        $set->flag_project = 0;
        $set->save();
    } else {
        $set = new Project;
        $set->id_user = Auth::user()->id;
        $set->id_lokasi = $request->id_lokasi;
        $set->id_kategori_project = $request->id_kategori_project;
        $set->id_client = $request->id_client;
        $set->nama_project = $request->nama_project;
        $set->keterangan_project = $request->keterangan_project;
        $set->waktu_project = $request->waktu_project;
        $set->status_project = $request->status_project;
        $set->tags = $request->tags;
        $set->harga_project = $request->harga_project;
        $set->flag_project = 0;
        $set->save();
    }

    return redirect()->route('project.tambah')->with('message', 'Berhasil menambahkan project baru.');
  }

  public function edit($id)
  {
    $editproject = Project::find($id);
    $getclient = Client::where('flag_client', '1')->get();
    $getlokasi = Lokasi::where('flag_lokasi', '1')->get();
    $getkategoriproject = KategoriProject::where('flag_kategori_project', '1')->get();
    // dd($editproject);
    return view('backend/pages/tambahproject')
      ->with('editproject', $editproject)
      ->with('getclient', $getclient)
      ->with('getlokasi', $getlokasi)
      ->with('getkategoriproject', $getkategoriproject);
  }

  public function update(Request $request)
  {

    $logoProject = $request->file('logo_project');

    if ($logoProject!=null) {
      $photo_name_logo = time(). '.' . $logoProject->getClientOriginalExtension();

      $photo2 = explode('.', $photo_name_logo);

      $photo130_2 = $photo2[0]."_130x50.".$photo2[1];
      $photo261_2 = $photo2[0]."_261x269.".$photo2[1];
      $photo552_2 = $photo2[0]."_552x577.".$photo2[1];
      
      Image::make($logoProject)->fit(472,270)->save('images/'. $photo_name_logo);

      Image::make($file)->fit(130,50)->save('images/'. $photo130_2);
      Image::make($file)->fit(261,269)->save('images/'. $photo261_2);
      Image::make($file)->fit(552,577)->save('images/'. $photo552_2);

        $set = Project::find($request->id);
        $set->id_user = Auth::user()->id;
        $set->id_lokasi = $request->id_lokasi;
        $set->id_kategori_project = $request->id_kategori_project;
        $set->id_client = $request->id_client;
        $set->nama_project = $request->nama_project;
        $set->keterangan_project = $request->keterangan_project;
        $set->waktu_project = $request->waktu_project;
        $set->status_project = $request->status_project;
        $set->logo_project = $photo_name_logo;
        $set->tags = $request->tags;
        $set->harga_project = $request->harga_project;
        $set->flag_project = 0;
        $set->save();


    } else {
        $set = Project::find($request->id);
        $set->id_user = Auth::user()->id;
        $set->id_lokasi = $request->id_lokasi;
        $set->id_kategori_project = $request->id_kategori_project;
        $set->id_client = $request->id_client;
        $set->nama_project = $request->nama_project;
        $set->keterangan_project = $request->keterangan_project;
        $set->waktu_project = $request->waktu_project;
        $set->status_project = $request->status_project;
        $set->tags = $request->tags;
        $set->harga_project = $request->harga_project;
        $set->flag_project = 0;
        $set->save();
    }

    return redirect()->route('project.tambah')->with('message', 'Berhasil mengubah project.');
  }

  public function flagpublish($id)
  {
    $set = Project::find($id);
    if($set->flag_project=="1") {
      $set->flag_project = 0;
      $set->save();
    } elseif ($set->flag_project=="0") {
      $set->flag_project = 1;
      $set->save();
    }

    return redirect()->route('project.lihat')->with('message', 'Berhasil mengubah status publikasi project.');
  }

  public function delete($id)
  {
    $set = Project::find($id);
    $set->delete();

    return redirect()->route('project.lihat')->with('message', 'Berhasil menghapus publikasi.');
  }

}
