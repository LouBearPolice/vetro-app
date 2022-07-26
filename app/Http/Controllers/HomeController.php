<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(){

        //Must be logged in to view this page.
        $this->middleware(['auth']);

    }

    //View Posts
    public function index(){
        
        //Get list of posts on the index page -> Returns Collection
        $posts = Post::orderBy('created_at', 'desc')->with('user', 'likes')->paginate(5); //with('user', 'likes') prevent a high query count.

        return view('home.index', [
            'posts' => $posts
        ]);
    }

    //Create Post
    public function post(Request $request){

        //Validate
        $this->validate($request, [
            'post_content' => 'required',
        ]); 

        //Save Post
        $request->user()->posts()->create([
            'post_content' => $request->post_content
        ]);

        return back();

    }

    //Delete Post
    public function destroy(Post $post, Request $request){
        
        //dd($post->id);

        if($post->ownedBy(auth()->user())){
            $post->delete();
        }else{
            //Create a policy to prevent deleting posts from other users
        }

        return back();

    }
}
