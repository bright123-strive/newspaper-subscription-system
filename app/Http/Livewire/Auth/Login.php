<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\User;


class Login extends Component
{

    public $email='';
    public $password='';

    protected $rules= [
        'email' => 'required|email',
        'password' => 'required'

    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function mount() {

        $this->fill(['email' => '', 'password' => '']);
    }

    // public function store()
    // {
    //     $attributes = $this->validate();

    //     if (! auth()->attempt($attributes)) {
    //         throw ValidationException::withMessages([
    //             'email' => 'Your provided credentials could not be verified.'
    //         ]);
    //     }

    //     session()->regenerate();

    //     return redirect('/dashboard');

    // }

    public function store()
{
    $attributes = $this->validate();

    if (!auth()->attempt($attributes)) {
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.',
        ]);
    }

    session()->regenerate();
  
    // Get the intended URL from the session, or use a default URL
    $intendedUrl = session()->pull('url.intended', route('dashboard'));

    return redirect($intendedUrl);
}

}
