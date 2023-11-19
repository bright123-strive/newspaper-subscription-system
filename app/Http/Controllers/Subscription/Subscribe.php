<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Subscription;
use Carbon\Carbon;
use PDF;

class Subscribe extends Controller
{

    public $subscriptionDuration= " ";
    public $userPublications = [];
    public $duration = "";
    public $user;
    public $userData;



    public function index()
    {
        $this->user = auth()->user();


        return view('subscription.subscribe')->with([
           "publications" => Publication::all(),
           "location"     => $this->user->location,
           "region"     => $this->user->region,
        ]);
    }




    public function store(Request $request)
    {

        $this->userData = auth()->user()->name;


        // Validate form data
        // (Your validation code goes here)

        // Calculate start and end dates using Carbon
        $startDate = Carbon::now();
        $endDate = $startDate->copy()->addMonths($request->input('subscription_duration'));
        $numberOfDays = $endDate->diffInDays($startDate);
        $this->duration=$request->input('subscription_duration');

        // Create a subscription record
        $subscription = new Subscription([
            'user_id' => auth()->id(),
            'location' =>$this->userData = auth()->user()->location,
            'region' => $this->userData = auth()->user()->region,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'duration' => $this->duration,
             // You might want to calculate the total amount server-side
        ]);

        $subscription->save();

        // Attach selected publications with copies to the subscription
        $publications = $request->input('publication');



        $copies = $request->input('copies');


        foreach ($publications as $key => $publicationId) {
            $copyCount = $copies[$key];

            // Assuming you have a relationship between Subscription and Publication
            $publicationModel = Publication::find($publicationId);

            // Calculate the total price for the current publication
            $totalPrice = $publicationModel->price * $copyCount * $numberOfDays;

            $this->userPublications[] = [
                'publication_id' => $publicationId,
                'copies' => $copyCount,
                'publication_name' => $publicationModel->name,
                'price' => $publicationModel->price,
                'total_price' => $totalPrice,
            ];



            // Attach the publication to the current subscription with the number of copies and total price
            $subscription->publications()->attach($publicationId, [
                'copies' => $copyCount,
                'total_price' => $totalPrice,
                // Add other relevant details you want to store in the pivot table
            ]);

            // Optionally, you can decrement the available copies in the publications table
            // $publicationModel->decrement('copies', $copyCount);
        }


      // create sessions data for pdf generation
      session([
        'location' => $subscription->location,
        'region' => $subscription->region,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'duration' => $this->duration,
        'user' => auth()->user(),
        'publications' => $this->userPublications,
        'totalPrice' => $totalPrice,
    ]);

        // Redirect or show success message
        return view('subscription.receipt')->with([
            'location' => $subscription->location,
            'region' => $subscription->region,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'duration' => $this->duration,
            'user' => auth()->user(),
            'publications' => $this->userPublications,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function exportPdf()
{
    // Retrieve data from the session
    $data = session()->all();

    $pdf = PDF::loadView('subscription.generatePdf', [
        'sessionData' => $data,
    ]);
    return $pdf->download(auth()->user()->name.".pdf");
}




}
