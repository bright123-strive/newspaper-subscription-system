<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class Dashboard extends Component
{
    public function render()
    {


        $loggedInUser = Auth::user();

        // Count active subscriptions
        $userActiveSubscriptionsCount = Subscription::where('status', 'active')
            ->where('user_id', $loggedInUser->id)
            ->count();

        // Count expired subscriptions
        $expiredSubscriptionsCount = Subscription::where('status', 'expired')
            ->where('user_id', $loggedInUser->id)
            ->count();

        // Count not activated subscriptions
        $notActivatedSubscriptionsCount = Subscription::where('status', 'inactive')
            ->where('user_id', $loggedInUser->id)
            ->count();

        $subscribersCount = User::where('role_id', 3)->count();

        $activeSubscriptionsCount = Subscription::where('status', 'active')->count();
        $usersCount = User::whereIn('role_id', [1, 2])->count();

        $today = Carbon::today();


       $subscriptionsCount = Subscription::whereDate('created_at', $today)->count();




        return view('livewire.dashboard',[
            'subscribers' =>$subscribersCount,
            'activeSubscriptions' =>$activeSubscriptionsCount,
            'stuffs' =>$usersCount,
            'todaysSubscription' =>$subscriptionsCount,
            'userActiveSubscriptions' =>$userActiveSubscriptionsCount,
            'userInActiveSubscriptions' =>$notActivatedSubscriptionsCount,
            'userExpiredSubscriptions' =>$expiredSubscriptionsCount,

        ]);
    }
}
