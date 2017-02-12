<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Client;
use App\Models\About;
use App\Models\Project;
use App\Http\Controllers\Controller;

class ServiceFrontEndPageController extends Controller
{

  public function index()
  { 
  	 $getservice= Services::select('*')->get();
     $getclient = Client::select('*')->get();
     $getproject = Project::select('*')->limit(4)->orderBy('created_at','desc')->get();
     $getabout = About::select('*')->where('flag_tentang',2)->get();

     // dd($getproject);
    return view('frontend.pages.service', compact('getservice', 'getclient', 'getproject','getabout'));
  }

  
}
