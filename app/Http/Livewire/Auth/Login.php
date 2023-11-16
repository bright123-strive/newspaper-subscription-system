<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


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
    Log::info('Session ID: ' . session()->getId());
    $fromSubscribe = session('from_subscribe', 'false');

    // Check if the user came from the "Subscribe Now" button
    if (request('from_subscribe')) {

        // Redirect to the subscription page
        return redirect()->route('subscribe');
    }

    // Default behavior: Redirect to the dashboard
    return redirect('/dashboard');
}

}
