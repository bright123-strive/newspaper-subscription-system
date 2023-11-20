<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use PDF;


class SubscriptionPerUser extends Controller
{




    public function index()
    {
        $allUsers=User::where('role_id','3')->get();
        return view('livewire.admin.reports.subscription-per-user')->with([
           'users' =>$allUsers,
        ]);
    }

    public function displaySubscriptionPeriods(Request $request)
{
    // Get the selected user_id from the form
    $selectedUserId = $request->input('user_id');

    // Query active and expired subscriptions related to each client
    $userSubscriptionsQuery = User::with('subscriptions')
    ->where('role_id','3');

    // Conditionally apply the where clause based on the selected user_id
    if ($selectedUserId !== 'all') {
        $userSubscriptionsQuery->where('id', $selectedUserId);
    }

    // Get the results
    $userSubscriptions = $userSubscriptionsQuery->get();

    // Calculate subscription periods and group by user
    $subscriptionPeriodsGrouped = [];

    foreach ($userSubscriptions as $user) {
        $userSubscriptionPeriods = [];

        foreach ($user->subscriptions as $subscription) {
            // Parse dates using Carbon
            $startDate = \Carbon\Carbon::parse($subscription->start_date);
            $endDate = \Carbon\Carbon::parse($subscription->end_date);

            $userSubscriptionPeriods[] = [
                'subscription_id' => $subscription->id,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'subscription_period' => $startDate->diffInMonths($endDate),
            ];
        }

        // Add the user's subscription periods to the grouped array
        $subscriptionPeriodsGrouped[$user->id] = [
            'user_name' => $user->name,
            'subscription_periods' => $userSubscriptionPeriods,
        ];
    }

    // Pass data to Blade view
    return view('livewire.admin.reports.subscription-per-user', ['subscriptionPeriodsGrouped' => $subscriptionPeriodsGrouped]);
}



    // public function exportPdf()
    // {
    //     $this->getUserData(request()); // Pass the current request to getUserData

    //     // Retrieve data from the session
    //     $data = session('subscriptionData', []);

    //     $pdf = PDF::loadView('livewire.admin.reports.regionpdf', [
    //         'sessionData' => $data,
    //     ]);

    //     return $pdf->download("region.pdf");
    // }

}
