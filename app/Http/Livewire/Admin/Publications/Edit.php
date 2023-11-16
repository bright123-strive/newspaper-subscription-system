<?php

namespace App\Http\Livewire\Admin\Publications;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\Component;
use App\Models\Publication;

class Edit extends Component
{



    public Publication $publication;
    use AuthorizesRequests;

    protected function rules(){

        return [
            'publication.name' => 'required|max:255'.$this->publication->id,
            'publication.price' =>'required',
        ];


    }

    public function mount($id){

        $this->publication = Publication::find($id);
    }


    public function updated($propertyName){

        $this->validateOnly($propertyName);
    }

    public function update(){

        $this->validate();

        $this->publication->update();

        return redirect(route('manage-publications'))->with('status', 'publicaton successfully updated.');
    }
    public function render()
    {
        return view('livewire.admin.publications.edit');
    }
}
