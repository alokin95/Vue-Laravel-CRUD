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
            'password' => 'required|min:6'
        ]);

        $new_user = new User($user);

        $new_user->password = bcrypt($new_user->password);

        $new_user->save();
    }

    public function deleteUser()
    {
        
        User::destroy(request()->id);
    }
}
