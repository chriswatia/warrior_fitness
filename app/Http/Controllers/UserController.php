<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //USER LIST
    public function index(){
        $user_list = User::all();
        return view('auth.users.index', compact('user_list'));
    }

    public function create(){
        $roles = Role::all();
        return view('auth.users.create', compact('roles'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('auth.users.edit', compact('user','roles'));
    }

    public function editProfile($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('auth.users.profile.edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $user = User::findOrFail($id);
        $user->update($data);
        if(Auth::user()->role_id == 1){
            return redirect('admin/users')->with('message', "User updated successfully");
        }
        else{
            return redirect('/admin')->with('message', "User updated successfully");
        }
        
    }

    public function updateProfile(Request $request, $id)
    {
        $data = $request->all();

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect('/')->with('message', "User updated successfully");
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/users')->with('message', "User deleted successfully");
    }
}
