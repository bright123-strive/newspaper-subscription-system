<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Subscription;
use Carbon\Carbon;

class Subscribe extends Controller
{

    public $subscriptionDuration= " ";

    public function index()
    {
        $user = auth()->user();


        return view('subscription.subscribe')->with([
           "publications" => Publication::all(),
           "location"     => $user->location,
        ]);
    }




    public function store(Request $request)
    {
        // Validate form data
        // (Your validation code goes here)

        // Calculate start and end dates using Carbon
        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addMonths($request->input('subscription_duration'));
        $numberOfDays = $endDate->diffInDays($startDate);



        // Create a subscription record
        $subscription = new Subscription([
            'user_id' => auth()->id(),
            'location' => $request->input('location'),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'price' => 8000, // You might want to calculate the total amount server-side
        ]);

        $subscription->save();

        // Attach selected publications with copies to the subscription
        $publications = $request->input('publication');

        $copies = $request->input('copies');

        // foreach ($publications as $key => $publicationId) {
        //     $copyCount = $copies[$key];

        //     // Assuming you have a relationship between Subscription and Publication
        //     $subscription->publications()->attach($publicationId, [
        //         'copies' => $copyCount,
        //         // Add other relevant details you want to store in the pivot table
        //     ]);

        //     // Optionally, you can decrement the available copies in the publications table
        //     $publicationModel = Publication::find($publicationId);
        //     // $publicationModel->decrement('copies', $copyCount);
        // }

        foreach ($publications as $key => $publicationId) {
            $copyCount = $copies[$key];

            // Assuming you have a relationship between Subscription and Publication
            $publicationModel = Publication::find($publicationId);

            // Calculate the total price for the current publication
            $totalPrice = $publicationModel->price * $copyCount * $numberOfDays;

            // Attach the publication to the current subscription with the number of copies and total price
            $subscription->publications()->attach($publicationId, [
                'copies' => $copyCount,
                'total_price' => $totalPrice,
                // Add other relevant details you want to store in the pivot table
            ]);

            // Optionally, you can decrement the available copies in the publications table
            // $publicationModel->decrement('copies', $copyCount);
        }


        // Redirect or show success message
        return redirect()->route('dashboard')->with('success', 'Subscription successful!');
    }



}
