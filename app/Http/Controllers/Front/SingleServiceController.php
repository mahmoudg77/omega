<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class SingleServiceController extends Controller
{
//    public function getSingleService(){
//        $allSlider = Post::where('is_published',1)->where('post_type_id', 4)->orderBy('id', 'desc')->get();
//        
//        \App\Models\Visit::log(\App\Models\Post::class,$singlePost->id);
//        
//        return view('singleService', compact('allSlider'));
//    }
    
    public function getPostServicesBySlug($slug){

        $singlePost= post::where('slug', $slug)->where('is_published',1)->first();
        if(!$singlePost){
            return view('errors.404');
        }
        \App\Models\Visit::log(\App\Models\Post::class,$singlePost->id);
        
        //$lastPosts = Post::where('post_type_id', 2)->where('is_published',1)->orderBy('id', 'desc')->take(4)->get();
        //$allcats = Category::where('parent_id', '<>',null)->get();
        
        //get related posts
        //$related_posts = Post::where('id', '!=', $singlePost->id)->where('is_published',1)
            //->where('category_id', '=', $singlePost->category_id)->take(3)->get();
        
        if($singlePost->post_type_id==1 || $singlePost->post_type_id==3){
            return view('page', compact('singlePost'));
        }elseif($singlePost->post_type_id==2){
            return view('singleService', compact('singlePost'));
        }

    }
    
}

?>