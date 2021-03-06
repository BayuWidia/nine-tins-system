<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use DB;
use Hash;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\MasterSKPD;

class UserProfileController extends Controller
{
  public function index()
  {
    $getuser = User::find(Auth::user()->id);
    $countberita = Berita::where('id_user', $getuser->id)->count();
    $countberitabelumpublish = Berita::where('id_user', $getuser->id)->where('flag_publish', '0')->count();
    $countberitasudahpublish = Berita::where('id_user', $getuser->id)->where('flag_publish', '1')->count();


    return view('backend/pages/profile')
      ->with('getuser', $getuser)
      ->with('countberita', $countberita)
      ->with('countberitabelumpublish', $countberitabelumpublish)
      ->with('countberitasudahpublish', $countberitasudahpublish);
  }

  public function edit(Request $request)
  {
    $file = $request->file('url_foto');
    if ($file!=null) {
      $photo = time(). '.' . $file->getClientOriginalExtension();

      $photo1 = explode('.', $photo);
      $photo480 = $photo1[0]."_480x495.".$photo1[1];

      Image::make($file)->fit(160,160)->save('images/'. $photo);
      Image::make($file)->fit(480,495)->save('images/'. $photo480);

      $set = User::find($request->id);
      $set->name = $request->name;
      $set->url_foto = $photo;
      $set->facebook = $request->facebook;
      $set->twitter = $request->twitter;
      $set->save();
    } else {
      $set = User::find($request->id);
      $set->name = $request->name;
      $set->facebook = $request->facebook;
      $set->twitter = $request->twitter;
      $set->save();
    }

    return redirect()->route('profile.index')->with('message', 'Berhasil menyimpan data profile.');
  }


  public function berita($id)
  {
    $getuser = User::find($id);
    $countberita = Berita::where('id_user', $id)->count();
    $countberitabelumpublish = Berita::where('id_user', $id)->where('flag_publish', '0')->count();
    $countberitasudahpublish = Berita::where('id_user', $id)->where('flag_publish', '1')->count();
    $getberita = DB::table('berita')->leftJoin('kategori_berita','berita.id_kategori','=','kategori_berita.id')
                ->where('berita.id_user', $id)
                ->select('*', 'berita.created_at')
                ->paginate(5); 
                
    return view('backend/pages/beritauser')
      ->with('getuser', $getuser)
      ->with('getberita', $getberita)
      ->with('countberita', $countberita)
      ->with('countberitabelumpublish', $countberitabelumpublish)
      ->with('countberitasudahpublish', $countberitasudahpublish);
  }

  public function changePassword(ChangePasswordRequest $request)
  {
    $user = User::find($request->id);

    if(Hash::check($request->oldpass, $user->password))
    {
      $user->password = Hash::make($request->newpass);
      $user->save();

      return redirect()->route('profile.index')->with('message', "Berhasil mengganti password.");
    }
    else {
      return redirect()->route('profile.index')->with('erroroldpass', 'Mohon masukkan password lama anda dengan benar.');
    }
  }

}
