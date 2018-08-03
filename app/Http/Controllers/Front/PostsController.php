<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    // get last 6 posts in home page 
    public function getLastPosts(){
        $lastPosts = Post::where('is_published',1)->where('post_type_id', 2)->orderBy('id', 'desc')->take(6)->get();
        $allSlider = Post::where('is_published',1)->where('post_type_id', 4)->orderBy('id', 'desc')->get();
        
        \App\Models\Visit::log("HomePage",0);
        
        return view('welcome', compact('lastPosts', 'allSlider'));
    }
    
}

?>
