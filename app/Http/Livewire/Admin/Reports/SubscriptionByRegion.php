<?php

namespace App\Http\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Subscription;
use Carbon\Carbon;
use PDF;



use Illuminate\Support\Facades\DB;


class SubscriptionByRegion extends Component
{
    public $region="";

    public $subscriptionData = [];
    public function getUserData(){


        $userSubscriptions = Subscription::where('region',$this->region)->get();


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

           session(['subscriptionData' => $this->subscriptionData]);

            return $this->subscriptionData;
        }


    }

    public function exportPdf()
    {


        $this->getUserData();
        // Retrieve data from the session
        $data = session('subscriptionData', []);

        $pdf = PDF::loadView('livewire.admin.reports.activeSubscribersPdf', [
            'sessionData' => $data,
        ]);

        return $pdf->download("activesubscribers.pdf");
    }

    public function render()
    {

        $this->getUserData();


        return view('livewire.admin.reports.subscription-by-region',[
            'subscriptionData' => $this->subscriptionData,
        ]);
    }
}


    // public function render()
    // {
    //     return view('livewire.admin.reports.subscription-by-region');
    // }

