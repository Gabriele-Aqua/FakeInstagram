<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;



class PostsController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        //Validate Data
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        //upload IMG POST, to stoage/uploads
        $imagePath =  request('image')->store('uploads' , 'public');

        //IMG FIT by external lib: invervention/Image
        $image = Image::make(public_path("storage/{$imagePath}"))->fit('1200','1200')->save();

        //Add Post per quel User
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath, 
        ]);

        return redirect('/profile/' . auth()->user()->id  );
    }

    //TRICK
    //se $post è uguale al router.web.php a $post
    //Basta richiamre il model del post per ritornare il Post (non abbiamo bisogno di un findOrFail)
    public function show(\App\Models\Post $post  ){

        //compact = ritorna alla view tutte le varibili che metchano al interno di post
        return view('posts.show',compact('post'));
    }
 
}
