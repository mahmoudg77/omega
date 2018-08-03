<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class SingleController extends Controller
{
    //get posts by id
    public function getPostByID($id){
        $singlePost= post::where('id', '=', $id)->where('is_published',1)->first();
        if(!$singlePost){
            return view('errors.404');
        }
        \App\Models\Visit::log(\App\Models\Post::class,$id);
        $lastPosts = Post::where('post_type_id', 2)->where('is_published',1)->orderBy('id', 'desc')->take(4)->get();
        
        $allcats = Category::where('parent_id', '<>',null)->get();
        
        return view('single', compact('singlePost', 'lastPosts', 'allcats'));
    }
    
    
    //get posts by slug
    public function getPostBySlug($slug){

        $singlePost= post::where('slug', $slug)->where('is_published',1)->first();
        if(!$singlePost){
            return view('errors.404');
        }
        \App\Models\Visit::log(\App\Models\Post::class,$singlePost->id);
        $lastPosts = Post::where('post_type_id', 2)->where('is_published',1)->orderBy('id', 'desc')->take(4)->get();
        $allcats = Category::where('parent_id', '<>',null)->get();
        
        //get related posts
        $related_posts = Post::where('id', '!=', $singlePost->id)->where('is_published',1)
            ->where('category_id', '=', $singlePost->category_id)->take(3)->get();
        
        if($singlePost->post_type_id==1 || $singlePost->post_type_id==3){
            return view('page', compact('singlePost', 'lastPosts', 'allcats'));
        }elseif($singlePost->post_type_id==2){
            return view('single', compact('singlePost', 'lastPosts', 'allcats', 'related_posts'));
        }

    }
    
//    public function getSidebar(){
//        $lastPosts = Post::where('post_type_id', 2)->where('is_published',1)->orderBy('id', 'desc')->take(4)->get();
//        $allcats = Category::all();
//        
//        return view('sidebar', compact('lastPosts', 'allcats'));
//    }
}
