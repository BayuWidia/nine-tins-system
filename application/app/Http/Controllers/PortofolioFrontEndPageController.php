<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Blockquote;
use App\Models\Testimonial;

class PortofolioFrontEndPageController extends Controller
{

  public function index()
  { 
  	$getproject = Project::select('*')->orderBy('created_at','desc')->get();
  	$getblockquote = Blockquote::select('*')->orderby('created_at','desc')->limit(2)->get();
    $gettestimonial = Testimonial::select('*')->orderby('created_at','desc')->limit(2)->get();

    return view('frontend.pages.portofolio', compact('getproject','getblockquote','gettestimonial'));
  }

  
}
