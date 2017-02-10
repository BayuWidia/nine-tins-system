<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Http\Requests;
use App\Models\Berita;
use App\Models\Client;
use App\Models\Project;
use App\Models\KategoriBerita;
use DB;

class DashboardController extends Controller
{

  public function index()
  {
    if (Auth::user()->level=="1") {
      $beritaterbaru = DB::table('berita')
                        ->join('users', 'berita.id_user', '=', 'users.id')
                        ->select('*', 'berita.created_at', 'berita.updated_at')
                        ->orderby('berita.created_at', 'desc')
                        ->limit(5)->get();
      $users = DB::table('users')
                        ->select('*')
                        ->orderby('users.created_at', 'desc')
                        ->paginate(8);

      $countberita = Berita::all()->count();
      $countproject = Project::all()->count();
      $countsudahterdaftar = User::where('activated', 1)->count();
      $countclient = Client::all()->count();

    } else {
      $beritaterbaru = DB::table('berita')
                        ->join('users', 'berita.id_user', '=', 'users.id')
                        ->select('*', 'berita.created_at', 'berita.updated_at')
                        ->where('id_user', Auth::user()->id)
                        ->orderby('berita.created_at', 'desc')
                        ->limit(5)->get();
      $users = DB::table('users')
                        ->select('*')
                        ->orderby('users.created_at', 'desc')
                        ->paginate(8);

      $countberita = Berita::where('id_user', Auth::user()->id)->count();
      $countproject = Project::all()->count();
      $countsudahterdaftar = User::where('activated', 1)->count();
      $countclient = Client::all()->count();
      
    }
    return view('backend/pages/dashboard')
      ->with('countberita', $countberita)
      ->with('countproject', $countproject)
      ->with('countsudahterdaftar', $countsudahterdaftar)
      ->with('countclient', $countclient)
      ->with('beritaterbaru', $beritaterbaru)
      ->with('users', $users);
  }
}
