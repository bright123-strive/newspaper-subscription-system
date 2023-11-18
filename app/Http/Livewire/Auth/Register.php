<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $name ='';
    public $email = '';
    public $phone = '';
    public $location = '';
    public $region = '';
    public $password = '';
    public $password_confirmation= '';
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|regex:/^\+[0-9]{1,15}$/|unique:users,phone',
        'location' => 'required',
        'region' => 'required',
        'password' => 'required|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*[@_&])[A-Za-z\d@_&]+$/',
    ];
    protected $messages = [
        'password.regex' => 'The password must contain at least one uppercase letter and one of the following symbols: @, _, or &.',
        'password.min' => 'The password must be at least 8 characters long.',
        'password.confirmed' => 'The password confirmation does not match.',
    ];


    public function store(){

        $attributes = $this->validate();

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
