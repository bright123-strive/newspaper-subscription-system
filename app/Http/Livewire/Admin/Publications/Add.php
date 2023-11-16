<?php

namespace App\Http\Livewire\Admin\Publications;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\Component;
use App\Models\Publication;

class Add extends Component
{

    use AuthorizesRequests;

    public $name = '';
    public $price = '';





    protected $rules = [

        'name' => 'required|max:255',
        'price' => 'required',

    ];


    public function store(){



        $this->validate();

        Publication::create([
            'name' => $this->name,
            'price' => $this->price,

        ]);

        return redirect(route('manage-publications'))->with('status','publication successfully created.');
    }
    public function render()
    {
        return view('livewire.admin.publications.add');
    }
}
