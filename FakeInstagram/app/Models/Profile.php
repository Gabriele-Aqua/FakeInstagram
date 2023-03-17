<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = []; 

    public function getProfileImg(){
        $imgPath =  $this->image ? $this->image : 'profile/ZMMkcJ0M5KpHTg3ARbdpG1nDewtR9TSS55yx4Sna.jpg';
        return '/storage/' . $imgPath;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class);
        //Dipende da User
    }
}
