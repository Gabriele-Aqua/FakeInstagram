<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;


use App\Models\User;

class ProfileController extends Controller
{  

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $isSameProfile = (auth()->user())  ? auth()->user()->id == $user->id : false;
        
        return view('profile.index', compact('user', 'follows','isSameProfile'));
           
    }

    public function edit(User $user ){
        //Authorze by Policy
        $this->authorize('update', $user->profile);

        return view('profile.edit', compact('user'));
         
    } 


    public function update(User $user){
        //Authorze by Policy
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title' => 'required',
            'description' => 'requi red',
            'link'=> 'url',
            'image' => '',
        ]);

        if(request('image')){
            //upload IMG POST, to stoage/uploads
            $imagePath =  request('image')->store('profile' , 'public');

            //IMG FIT by external lib: invervention/Image
            $image = Image::make(public_path("storage/{$imagePath}"))->fit('1000','1000')->save();

            //new Array for Fix defaultImg
            $imgArr = ['image' => $imagePath];
        }

        //Disabilitare guard dentro il model profile
        auth()->user()->profile->update(array_merge(
            $data,
            $imgArr ?? []
        ));

        return redirect("/profile/{$user->id}");

    }
}
