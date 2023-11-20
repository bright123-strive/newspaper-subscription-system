<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;


class Dashboard extends Component
{
    public function render()
    {
        $subscribersCount = User::where('role_id', 3)->count();
        $activeSubscriptionsCount = Subscription::where('status', 'active')->count();
        $usersCount = User::whereIn('role_id', [1, 2])->count();

        $today = Carbon::today();


       $subscriptionsCount = Subscription::whereDate('created_at', $today)->count();

       dd($subscriptionsCount);


        return view('livewire.dashboard',[
            'subscribers' =>$subscribersCount,
            'activeSubscriptions' =>$activeSubscriptionsCount,
            'stuffs' =>$usersCount,

        ]);
    }
}
