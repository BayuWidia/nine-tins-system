<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Services;
use App\Models\Skill;
use App\Models\Client;
use App\Models\Features;
use App\Models\Blockquote;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;

class WelcomeFrontEndPageController extends Controller
{

  public function index()
  { 
  	$getabout = About::select('*')->first();

    $getskill= Skill::select('*')
      ->limit(3)
      ->get();

    $getfeature = Features::select('*')->get();
    $getclient = Client::select('*')->get();
    $getclient = Client::select('*')->get();
    $getblockquote = Blockquote::select('*')->orderby('created_at','desc')->limit(2)->get();
    $gettestimonial = Testimonial::select('*')->orderby('created_at','desc')->limit(2)->get();

    // dd($gettestimonial);
    return view('frontend.pages.home', compact('getabout', 'getskill', 'getfeature', 'getclient','getblockquote','gettestimonial'));
  }

  
}
