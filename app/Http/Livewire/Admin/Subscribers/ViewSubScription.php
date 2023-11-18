<?php

namespace App\Http\Livewire\Admin\Subscribers;

use Livewire\Component;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

class ViewSubScription extends Component
{
    public $subscriptionId;

    public function mount($id)
    {
        $this->subscriptionId = $id;
    }

    public function render()
    {
        // Retrieve data from the publication_subscription table for the given subscription ID with publication name
        $subscriptionData = DB::table('publication_subscription')
            ->select(
                'publication_subscription.publication_id',
                'publications.name as publication_name',
                'publication_subscription.copies',
                'publication_subscription.total_price'
            )
            ->join('publications', 'publication_subscription.publication_id', '=', 'publications.id')
            ->where('subscription_id', $this->subscriptionId)
            ->get();

        return view('livewire.admin.subscribers.view-sub-scription', [
            'subscriptionData' => $subscriptionData,
        ]);
    }
}
