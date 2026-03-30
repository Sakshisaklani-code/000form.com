<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpressController extends Controller
{
    public function terms()
    {
        return view('pages.express.terms');
    }

    public function privacyPolicy()
    {
        return view('pages.express.privacy-policy');
    }

    public function refundPolicy()
    {
        return view('pages.express.refund');
    }
}
