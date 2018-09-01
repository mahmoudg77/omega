<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function getPostsByCatSlug($slug){
        
        $category = \App\Models\Category::where('slug', $slug)->first();
        
        $allPostsByCat = $category->Posts()->where('is_published',1)->where('post_type_id', 2)->get();
        if(!$allPostsByCat){
            return response(view('errors.404'),404);
        }
        

        $lastPosts = Post::where('post_type_id', 2)->where('is_published', 1)->orderBy('id', 'desc')->take(4)->get();
        $allcats = Category::where('parent_id', '<>',null)->get();



        $title=$category->title;
        $description=$category->description;

        \App\Models\Visit::log(\App\Models\Category::class,$category->id);

        return view('categoryBlogs', compact('allPostsByCat', 'title','description', 'lastPosts', 'allcats'));
    }


    public function getPostsByTag($tag){

        $tagobj=\App\Models\Tag::where('name',$tag)->first();
        if(!$tagobj){
            return response(view('errors.404'),404);
        }

        $allPostsByCat =$tagobj->Posts()->orderBy('id','desc')->get();
        

        $lastPosts = Post::where('post_type_id', 2)->where('is_published', 1)->orderBy('id', 'desc')->take(4)->get();
        $allcats = Category::where('parent_id', '<>',null)->get();

        \App\Models\Visit::log(\App\Models\Tag::class,$tagobj->id);

     $title=$tag;
     $description=$tag;

    return view('categoryBlogs', compact('allPostsByCat', 'title','description', 'lastPosts', 'allcats'));

    }
     public function getAllPosts(){

 

        $allPostsByCat =Post::where('is_published',1)->where('post_type_id', 2)->orderBy('id','desc')->get();
        

        $lastPosts = Post::where('post_type_id', 2)->where('is_published', 1)->orderBy('id', 'desc')->take(4)->get();
        $allcats = Category::where('parent_id', '<>',null)->get();

        //\App\Models\Visit::log(\App\Models\Tag::class,$tagobj->id);

        $title="أحدث المقالات";
        $description="";

        return view('categoryBlogs', compact('allPostsByCat', 'title','description', 'lastPosts', 'allcats'));

    }
}
