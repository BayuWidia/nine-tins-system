<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Services;
use App\Models\Skill;
use App\Models\User;
use App\Http\Controllers\Controller;

class AboutFrontEndPageController extends Controller
{

  public function index()
  { 

  	$getabout = About::select('*')->where('flag_tentang',1)->get();
  	
  	$getskill= Skill::select('*')
      ->limit(3)
      ->get();
      
    $getuser = User::select('*')->get();

    // dd($getuser);

    return view('frontend.pages.about', compact('getabout', 'getskill','getuser'));
  }

  
}
