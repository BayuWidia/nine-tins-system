<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests;

class ClientController extends Controller
{
  public function lihat()
  {
    $getclient = Client::get();
    return view('backend/pages/lihatclient')->with('getclient', $getclient);
  }

  public function tambah()
  {
     $getClient = Client::get();

    return view('backend/pages/tambahclient')->with('getClient', $getClient);
  }

  public function store(Request $request)
  {
    $urlClient = $request->file('url_client');
    $logoClient = $request->file('logo_client');

    if ($urlClient!=null && $logoClient!=null) {
        $photo_name_url = time(). '.' . $urlClient->getClientOriginalExtension();
        $photo_name_logo = time(). '.' . $logoClient->getClientOriginalExtension();

        $photo1 = explode('.', $photo_name_url);
        $photo2 = explode('.', $photo_name_logo);

        $photo130_1 = $photo1[0]."_130x50.".$photo1[1];
        $photo261_1 = $photo1[0]."_261x269.".$photo1[1];
        $photo552_1 = $photo1[0]."_552x577.".$photo1[1];

        $photo130_2 = $photo2[0]."_130x50.".$photo2[1];
        $photo261_2 = $photo2[0]."_261x269.".$photo2[1];
        $photo552_2 = $photo2[0]."_552x577.".$photo2[1];
        
        Image::make($urlClient)->fit(472,270)->save('images/'. $photo_name_url);
        Image::make($logoClient)->fit(472,270)->save('images/'. $photo_name_logo);

        Image::make($urlClient)->fit(130,50)->save('images/'. $photo130_1);
        Image::make($urlClient)->fit(261,269)->save('images/'. $photo261_1);
        Image::make($urlClient)->fit(552,577)->save('images/'. $photo552_1);

        Image::make($logoClient)->fit(130,50)->save('images/'. $photo130_2);
        Image::make($logoClient)->fit(261,269)->save('images/'. $photo261_2);
        Image::make($logoClient)->fit(552,577)->save('images/'. $photo552_2);

          $set = new Client;
          $set->id_user = Auth::user()->id;
          $set->nama_client = $request->nama_client;
          $set->keterangan_client = $request->keterangan_client;
          $set->url_client = $photo_name_url;
          $set->logo_client = $photo_name_logo;
          $set->tags = $request->tags;
          $set->link_client = $request->link_client;
          $set->flag_client = 0;
          $set->save();
    } else if ($urlClient!=null) {
      $photo_name_url = time(). '.' . $urlClient->getClientOriginalExtension();

      $photo1 = explode('.', $photo_name_url);
      $photo130_1 = $photo1[0]."_130x50.".$photo1[1];
      $photo261_1 = $photo1[0]."_261x269.".$photo1[1];
      $photo552_1 = $photo1[0]."_552x577.".$photo1[1];
      
      Image::make($urlClient)->fit(472,270)->save('images/'. $photo_name_url);
      Image::make($urlClient)->fit(130,50)->save('images/'. $photo130_1);
      Image::make($urlClient)->fit(261,269)->save('images/'. $photo261_1);
      Image::make($urlClient)->fit(552,577)->save('images/'. $photo552_1);

        $set = new Client;
        $set->id_user = Auth::user()->id;
        $set->nama_client = $request->nama_client;
        $set->keterangan_client = $request->keterangan_client;
        $set->url_client = $photo_name_url;
        $set->tags = $request->tags;
        $set->link_client = $request->link_client;
        $set->flag_client = 0;
        $set->save();
    } else if ($logoClient!=null) {
      $photo_name_logo = time(). '.' . $logoClient->getClientOriginalExtension();

      $photo2 = explode('.', $photo_name_logo);
      $photo130_2 = $photo2[0]."_130x50.".$photo2[1];
      $photo261_2 = $photo2[0]."_261x269.".$photo2[1];
      $photo552_2 = $photo2[0]."_552x577.".$photo2[1];
      
      Image::make($logoClient)->fit(472,270)->save('images/'. $photo_name_logo);
      Image::make($logoClient)->fit(130,50)->save('images/'. $photo130_2);
      Image::make($logoClient)->fit(261,269)->save('images/'. $photo261_2);
      Image::make($logoClient)->fit(552,577)->save('images/'. $photo552_2);

        $set = new Client;
        $set->id_user = Auth::user()->id;
        $set->nama_client = $request->nama_client;
        $set->keterangan_client = $request->keterangan_client;
        $set->logo_client = $photo_name_logo;
        $set->tags = $request->tags;
        $set->link_client = $request->link_client;
        $set->flag_client = 0;
        $set->save();
    } else {
        $set = new Client;
        $set->id_user = Auth::user()->id;
        $set->nama_client = $request->nama_client;
        $set->keterangan_client = $request->keterangan_client;
        $set->tags = $request->tags;
        $set->link_client = $request->link_client;
        $set->flag_client = 0;
        $set->save();
    }

    return redirect()->route('client.tambah')->with('message', 'Berhasil menambahkan client baru.');
  }

  public function edit($id)
  {
    $editclient = client::find($id);

    return view('backend/pages/tambahclient')
      ->with('editclient', $editclient);
  }

  public function update(Request $request)
  {

    $urlClient = $request->file('url_client');
    $logoClient = $request->file('logo_client');

    if ($urlClient!=null && $logoClient!=null) {
      $photo_name_url = time(). '.' . $urlClient->getClientOriginalExtension();
      $photo_name_logo = time(). '.' . $logoClient->getClientOriginalExtension();

      $photo1 = explode('.', $photo_name_url);
      $photo2 = explode('.', $photo_name_logo);

      $photo130_1 = $photo1[0]."_130x50.".$photo1[1];
      $photo261_1 = $photo1[0]."_261x269.".$photo1[1];
      $photo552_1 = $photo1[0]."_552x577.".$photo1[1];

      $photo130_2 = $photo2[0]."_130x50.".$photo2[1];
      $photo261_2 = $photo2[0]."_261x269.".$photo2[1];
      $photo552_2 = $photo2[0]."_552x577.".$photo2[1];
      
      Image::make($urlClient)->fit(472,270)->save('images/'. $photo_name_url);
      Image::make($logoClient)->fit(472,270)->save('images/'. $photo_name_logo);

      Image::make($urlClient)->fit(130,50)->save('images/'. $photo130_1);
      Image::make($urlClient)->fit(261,269)->save('images/'. $photo261_1);
      Image::make($urlClient)->fit(552,577)->save('images/'. $photo552_1);

      Image::make($logoClient)->fit(130,50)->save('images/'. $photo130_2);
      Image::make($logoClient)->fit(261,269)->save('images/'. $photo261_2);
      Image::make($logoClient)->fit(552,577)->save('images/'. $photo552_2);

        $set = Client::find($request->id);
        $set->id_user = Auth::user()->id;
        $set->nama_client = $request->nama_client;
        $set->keterangan_client = $request->keterangan_client;
        $set->url_client = $photo_name_url;
        $set->logo_client = $photo_name_logo;
        $set->tags = $request->tags;
        $set->link_client = $request->link_client;
        $set->save();
    } else if ($urlClient!=null) {
      $photo_name_url = time(). '.' . $urlClient->getClientOriginalExtension();

      $photo1 = explode('.', $photo_name_url);

      $photo130_1 = $photo1[0]."_130x50.".$photo1[1];
      $photo261_1 = $photo1[0]."_261x269.".$photo1[1];
      $photo552_1 = $photo1[0]."_552x577.".$photo1[1];
      
      Image::make($urlClient)->fit(472,270)->save('images/'. $photo_name_url);

      Image::make($urlClient)->fit(130,50)->save('images/'. $photo130_1);
      Image::make($urlClient)->fit(261,269)->save('images/'. $photo261_1);
      Image::make($urlClient)->fit(552,577)->save('images/'. $photo552_1);

        $set = lient::find($request->id);
        $set->id_user = Auth::user()->id;
        $set->nama_client = $request->nama_client;
        $set->keterangan_client = $request->keterangan_client;
        $set->url_client = $photo_name_url;
        $set->tags = $request->tags;
        $set->link_client = $request->link_client;
        $set->save();
    } else if ($logoClient!=null) {
      $photo_name_logo = time(). '.' . $logoClient->getClientOriginalExtension();

      $photo2 = explode('.', $photo_name_logo);

      $photo130_2 = $photo2[0]."_130x50.".$photo2[1];
      $photo261_2 = $photo2[0]."_261x269.".$photo2[1];
      $photo552_2 = $photo2[0]."_552x577.".$photo2[1];
      
      Image::make($logoClient)->fit(472,270)->save('images/'. $photo_name_logo);

      Image::make($logoClient)->fit(130,50)->save('images/'. $photo130_2);
      Image::make($logoClient)->fit(261,269)->save('images/'. $photo261_2);
      Image::make($logoClient)->fit(552,577)->save('images/'. $photo552_2);

        $set = Client::find($request->id);
        $set->id_user = Auth::user()->id;
        $set->nama_client = $request->nama_client;
        $set->keterangan_client = $request->keterangan_client;
        $set->logo_client = $photo_name_logo;
        $set->tags = $request->tags;
        $set->link_client = $request->link_client;
        $set->save();
    } else {
        $set = Client::find($request->id);
        $set->id_user = Auth::user()->id;
        $set->nama_client = $request->nama_client;
        $set->keterangan_client = $request->keterangan_client;
        $set->tags = $request->tags;
        $set->link_client = $request->link_client;
        $set->save();
    }

    return redirect()->route('client.tambah')->with('message', 'Berhasil mengubah client.');
  }

  public function flagpublish($id)
  {
    $set = Client::find($id);
    if($set->flag_client=="1") {
      $set->flag_client = 0;
      $set->save();
    } elseif ($set->flag_client=="0") {
      $set->flag_client = 1;
      $set->save();
    }

    return redirect()->route('client.lihat')->with('message', 'Berhasil mengubah status publikasi client.');
  }

  public function delete($id)
  {
    $check = Project::where('id_client', $id)->first();
    if($check=="") {
      $set = Client::find($id);
      $set->delete();
      return redirect()->route('client.lihat')->with('message', 'Berhasil menghapus client.');
    } else {
      return redirect()->route('client.lihat')->with('messagefail', 'Gagal melakukan hapus data. Data telah memiliki relasi dengan data yang lain.');
    }
  }

}
