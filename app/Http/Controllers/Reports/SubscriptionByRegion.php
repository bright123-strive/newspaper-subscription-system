<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;
use PDF;



use Illuminate\Support\Facades\DB;

class SubscriptionByRegion extends Controller
{

public $region = '';


    public function index()
    {

        return view('livewire.admin.reports.region-report');
    }

    public function getUserData(Request $request)
    {
        $this->region = $request->input('region');



        $userSubscriptions = Subscription::where('region', $this->region)->get();

        $subscriptionData = [];

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
        session(['subscriptionData' => $subscriptionData]);


        return view('livewire.admin.reports.region-report', compact('subscriptionData'));

    }

    public function exportPdf()
    {
        $this->getUserData(request()); // Pass the current request to getUserData

        // Retrieve data from the session
        $data = session('subscriptionData', []);

        $pdf = PDF::loadView('livewire.admin.reports.regionpdf', [
            'sessionData' => $data,
        ]);

        return $pdf->download("region.pdf");
    }

}
