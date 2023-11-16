<?php

namespace App\Http\Livewire\Admin\Publications;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

use Livewire\Component;
use App\Models\Publication;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public function destroy($id) {

        Publication::find($id)->delete();
        return redirect(route('manage-publications'))->with('status', 'publication successfully deleted.');
    }

    public function render()
    {
        return view('livewire.admin.publications.index',[
            "publications" => Publication::all(),
        ]);
    }
}
