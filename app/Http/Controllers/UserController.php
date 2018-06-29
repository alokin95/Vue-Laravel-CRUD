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
            'card_type' => 'required',
            'info' => 'required|max:300'
        ]);

        $new_user = new User($user);

        $new_user->password = bcrypt($new_user->password);

        $new_user->save();
    }

    public function deleteUser()
    {
        User::deleteUser();
    }

    public function singleUser($id)
    {
        return User::find($id);
    }

    public function edit(User $user)
    {

       $rules = [
            'user.name' => 'required|min:5|max:30',
            'user.email' => 'required|email',
            'user.password' => 'sometimes|required|min:6',
            'user.address' => 'required',
            'user.card_number' => 'required|numeric',
            'user.card_type' => 'required',
            'user.info' => 'required|max:300'
       ];

       $message = [
            'user.name.required' => 'The name field is required.',
            'user.name.min' => 'Name must be between 5 and 30 characters',
            'user.name.max' => 'Name must be between 5 and 30 characters',
            'user.email.required' => 'Please enter email address',
            'user.password' => 'Password must contain minimum 6 characters',
            'user.address' => 'Address field is required',
            'user.card_number.required' => 'Card number is required',
            'user.card_number.numeric' => 'Card number can only contain numbers',
            'user.card_type.required' => 'Card type is required',
            'user.info' => 'Enter some user information'
       ];

       $edited_user = request()->validate($rules, $message);

       
       $edit = $user->edit($edited_user['user']);

       if ($edit)
       {
           return 'User successfully edited';
       }

       return 'Error when updating user. Please try again.';
    }
}
