<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceFrontEndPageController extends Controller
{

  public function index()
  { 
    return view('frontend.pages.service');
  }

  
}
