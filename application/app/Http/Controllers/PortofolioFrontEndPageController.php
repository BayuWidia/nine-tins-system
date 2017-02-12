<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class PortofolioFrontEndPageController extends Controller
{

  public function index()
  { 
  	$getproject = Project::select('*')->orderBy('created_at','desc')->get();

    return view('frontend.pages.portofolio', compact('getproject'));
  }

  
}
