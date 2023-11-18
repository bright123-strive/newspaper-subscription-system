<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Receipt extends Controller
{
    public function index()
    {
        $user = auth()->user();


        return view('subscription.receipt');

    }
}
