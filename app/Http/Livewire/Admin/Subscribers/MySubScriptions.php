<?php

namespace App\Http\Livewire\Admin\Subscribers;

use Livewire\Component;
use App\Models\Subscription;

// MySubScriptions.php


use Illuminate\Support\Facades\DB;

class MySubScriptions extends Component
{
    public function render()
    {
        // Get subscription data
        $userSubscriptions = Subscription::where('user_id', auth()->id())
            ->where('status', 'active')
            ->get();

        // Process the data
        $subscriptionData = [];
        foreach ($userSubscriptions as $subscription) {
            // Get publication subscription data
            $publicationSubscriptionData = DB::table('publication_subscription')
                ->select(
                    DB::raw('SUM(copies) as total_copies'),
                    DB::raw('SUM(total_price) as total_price')
                )
                ->where('subscription_id', $subscription->id)
                ->first();

            // Calculate remaining days
            $remainingDays = now()->diffInDays($subscription->end_date);

            $subscriptionData[] = [
                'subscription_id' => $subscription->id,
                'status' => $subscription->status,
                'total_copies' => $publicationSubscriptionData->total_copies,
                'total_price' => $publicationSubscriptionData->total_price,
                'remaining_days' => $remainingDays,
            ];
        }

        

        return view('livewire.admin.subscribers.my-sub-scriptions', [
            'subscriptionData' => $subscriptionData,
        ]);
    }
}
