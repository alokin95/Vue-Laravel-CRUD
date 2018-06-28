<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function allUsers()
    {
        return User::all();
    }

    public function addUser()
    {
        
       
        $user = request()->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'address' => 'required',
            'card_number' => 'required|numeric|digits_between:1,20',
            'card_type' => 'required|alpha_num',
            'info' => 'required|max:300'
        ]);

        $new_user = new User($user);

        $new_user->password = bcrypt($new_user->password);

        $new_user->save();
    }

    public function deleteUser()
    {
        
        User::destroy(request()->id);
    }

    public function singleUser($id)
    {
        return User::find($id);
    }
}
