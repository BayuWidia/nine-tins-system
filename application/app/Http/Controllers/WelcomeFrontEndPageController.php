<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Controllers\Controller;

class WelcomeFrontEndPageController extends Controller
{

  public function index()
  { 
  	$getabout = About::select('*')->first();
    return view('frontend.pages.home', compact('getabout'));
  }

  
}
