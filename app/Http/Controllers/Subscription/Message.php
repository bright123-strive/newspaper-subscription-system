<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Message extends Controller
{
    public function index()
    {
        return view('subscription.message');
    }
}
