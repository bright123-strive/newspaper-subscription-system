<?php

namespace App\Http\Livewire\Admin\Reports;

use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PDF;
use Carbon\Carbon;

class ActiveSubscribers extends Component
{
    public $subscriptionData = [];

    public function getUserData()
    {
        $this->subscriptionData = []; // Initialize the array

        $userSubscriptions = Subscription::where('status', 'active')->get();

        // Process the data
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

            $this->subscriptionData[] = [
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

        // Store data in the session
        session(['subscriptionData' => $this->subscriptionData]);

        return $this->subscriptionData;
    }

    public function exportPdf()
    {
        $this->getUserData();
        // Retrieve data from the session
        $data = session('subscriptionData', []);

        $pdf = PDF::loadView('livewire.admin.reports.activeSubscribersPdf', [
            'sessionData' => $data,
        ]);

        // Clear the session data
        session()->forget('subscriptionData');

        return $pdf->download("activesubscribers.pdf");
    }

    public function render()
    {
        $this->getUserData();

        return view('livewire.admin.reports.active-subscribers', [
            'subscriptionData' => $this->subscriptionData,
        ]);
    }
}
