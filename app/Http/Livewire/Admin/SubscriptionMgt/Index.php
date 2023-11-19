<?php

namespace App\Http\Livewire\Admin\SubscriptionMgt;

use Livewire\Component;
use App\Models\Subscription;
use Carbon\Carbon;



use Illuminate\Support\Facades\DB;


class Index extends Component
{


    public function activateSubscription($id)
    {
        // Retrieve the subscription duration
        $duration = Subscription::where('id', $id)->first()->duration;

        // Update all subscriptions with the given ID
        Subscription::where('id', $id)->update([
            'status' => 'active',
            'start_date' => now(),
            'end_date' => now()->addMonths($duration),
        ]);

        return redirect(route('all-subscriptions'))->with('status', 'Subscription activated.');
    }

    public function render()
    {

        $userSubscriptions = Subscription::all();


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
            'user_id' => $subscription->user_id,
            'location' => $subscription->location,
            'region' => $subscription->region,
            'status' => $subscription->status,
            'total_copies' => $publicationSubscriptionData->total_copies,
            'total_price' => $publicationSubscriptionData->total_price,
            'remaining_days' => $remainingDays,
        ];
    }



        return view('livewire.admin.subscription-mgt.index',[
            'subscriptionData' => $subscriptionData,
        ]);
    }
}
