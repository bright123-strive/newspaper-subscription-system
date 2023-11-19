<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{


    use AuthorizesRequests;

    public function destroy($id){
        User::find($id)->delete();
        return redirect(route('role-management'))->with('status', 'Role successfully deleted.');
    }

    public function render()
    {
        return view('livewire.admin.users.index',[
            "users"=>User::all(),
        ]);
    }
}
