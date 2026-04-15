<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
   public function Core()
   {
      return view('pages.core');
   }
}
