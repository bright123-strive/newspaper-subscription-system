<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class Create extends Component
{



    use AuthorizesRequests;


    public $roles;
    public $email='';
    public $name ='';
    public $department='';
    public $password='';
    public $role_id='';
    public $passwordConfirmation='';

    protected $rules = [
        'email' => 'required|email|unique:users,email',
        'name' =>'required',
        'role_id' => 'required|exists:roles,id',
        'password' => 'required|min:8|same:passwordConfirmation|regex:/^(?=.*[A-Z])(?=.*[@_&])[A-Za-z\d@_&]+$/',
    ];
    protected $messages = [
        'password.regex' => 'The password must contain at least one uppercase letter and one of the following symbols: @, _, or &.',
        'password.min' => 'The password must be at least 8 characters long.',
        'password.confirmed' => 'The password confirmation does not match.',
    ];
    public function mount() {

        $this->roles = Role::get(['id','name']);

    }

    public function store(){

        $this->validate();


        // dd($this->department);


        User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => $this->password,
            'role_id' => $this->role_id,

        ]);

        return redirect(route('user-management'))->with('status','User successfully created.');
    }
    public function render()
    {
        return view('livewire.admin.users.create');
    }
}
