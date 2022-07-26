<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_content'
    ];

    //Check if a user has already like a lost:
    public function likedBy(User $user){
        //Check if user id is within the likes for this model: 
        return $this->likes->contains('user_id', $user->id); 
    }    

    //Retationship between post and user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //User may like miltiple posts
    public function likes(){
        return $this->hasMany(Like::class);
    }

    //Allow user to delete his posts only:
    public function ownedBy(User $user){
        return $user->id === $this->user_id;
    }
}
