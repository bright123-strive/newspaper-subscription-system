<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Subscribe extends Controller
{
    public function index()
    {
        dd("hello");
        return view('subscription.subscribe');
    }

}
