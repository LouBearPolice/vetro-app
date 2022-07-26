<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{

    public function __construct(){
        $this->middleware(['auth']);
    }

    //Save the Like
    public function save(Post $post, Request $request){ //Pass in the post model
        
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();

    }

    //Delete the like
    public function destroy(Post $post, Request $request){

        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();

    }
}
