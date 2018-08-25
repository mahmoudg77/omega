<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostsController extends Controller
{
    // get last 6 posts in home page 
    public function getLastPosts(){
        //$lastPosts = Post::where('is_published',1)->where('post_type_id', 2)->orderBy('id', 'desc')->take(6)->get();
        $allSlider = Post::where('is_published',1)->where('post_type_id', 4)->orderBy('id', 'desc')->get();
        
        $categoryServices = \App\Models\Category::where('parent_id',1)->get();
        
        $cateoryPartners = Post::where('category_id',7)->where('post_type_id', 2)->orderBy('id', 'asc')->get();
                
        $postsByCat= Post::where('category_id',6)->where('post_type_id', 2)->orderBy('id', 'asc')->get();
        
        \App\Models\Visit::log("HomePage",0);
        
        return view('welcome', compact('allSlider', 'categoryServices', 'cateoryPartners','postsByCat'));
    }
    
}

?>
