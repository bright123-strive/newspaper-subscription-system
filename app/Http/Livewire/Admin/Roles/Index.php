<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class Index extends Component
{

    use AuthorizesRequests;
    use WithPagination;




    public function destroy($id){
        if (!Role::find($id)->user->isEmpty()) {
            return back()->with('error', 'This role has users attached and can\'t be deleted.');
        }
        Role::find($id)->delete();
        return redirect(route('role-management'))->with('status', 'Role successfully deleted.');
    }

    public function render()
    {
        return view('livewire.admin.roles.index',[
            'roles' => Role::all(),
        ]);
    }
}
