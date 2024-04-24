<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
        function index()
        {
            return view('frontend.cart.index');
        }
}
