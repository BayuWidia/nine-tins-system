<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Blockquote;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;

class DetailBagiPengetahuanFrontEndPageController extends Controller
{

  public function index()
  { 

  	$getblockquote = Blockquote::select('*')->orderby('created_at','desc')->limit(2)->get();
    $gettestimonial = Testimonial::select('*')->orderby('created_at','desc')->limit(2)->get();

    return view('frontend.pages.dtlbgpengetahuan', compact('getblockquote','gettestimonial'));
  }

  
}
