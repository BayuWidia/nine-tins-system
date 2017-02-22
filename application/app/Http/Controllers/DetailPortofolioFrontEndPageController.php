<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Blockquote;
use App\Models\Testimonial;

class DetailPortofolioFrontEndPageController extends Controller
{

  public function index($id)
  { 
  	$getproject = Project::find($id);
  	$getprojectall = Project::select('*')->orderby('created_at','desc')->limit(4)->get();
  	$getblockquote = Blockquote::select('*')->orderby('created_at','desc')->limit(2)->get();
    $gettestimonial = Testimonial::select('*')->orderby('created_at','desc')->limit(2)->get();
  	
  	return view('frontend.pages.dtlportofolio', compact('getproject','getprojectall','getblockquote','gettestimonial'));
  }

  
}
