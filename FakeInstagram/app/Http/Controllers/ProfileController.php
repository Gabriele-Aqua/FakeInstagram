<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{

    public function index($user)
    {
        $currentUser = User::findOrFail($user);
      
        return view('profile.index', [
            'user' => $currentUser
        ]);
    }

    public function edit(User $user ){

        return view('profile.edit', compact('user'));
    } 


    public function update(User $user){

        $data = request()->validate([
            'title' => 'required',
            'description' => 'requi red',
            'link'=> 'url',
            'image' => '',
        ]);
 
        auth()->user()->profile->update($data);


        return redirect("/profile/{$user->id}");

    }
}
