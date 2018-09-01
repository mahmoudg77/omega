<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Post;

class PostsController extends Controller
{
    // get last 6 posts in home page 
    public function getLastPosts(){
        //$lastPosts = Post::where('is_published',1)->where('post_type_id', 2)->orderBy('id', 'desc')->take(6)->get();
        //$allSlider = Post::where('is_published',1)->where('post_type_id', 4)->orderBy('id', 'desc')->get();
        
        //$categoryServices = \App\Models\Category::where('parent_id',1)->get();
        
        //$cateoryPartners = Post::where('category_id',7)->where('post_type_id', 2)->orderBy('id', 'asc')->get();
                
        //$postsByCat= Post::where('category_id',6)->where('post_type_id', 2)->orderBy('id', 'asc')->get();
        
        \App\Models\Visit::log("HomePage",0);

        if(request()->has('search')){
            $search=request()->get('search');
            $allPostsByCat =Post::where('is_published',1)
                ->listsTranslations('title','body')
                ->where(function($q)use($search){
                    $q->where('title', 'like',"%".$search."%")
                        ->orWhere('body', 'like',"%".$search."%");
                })
                ->orderBy('id','desc')->pluck('id');
            //dd($allPostsByCat);
            if(count($allPostsByCat)>0){
                $allPostsByCat=Post::whereIn('id',$allPostsByCat)->get();
            }
            //dd($allPostsByCat);

            $lastPosts = Post::where('post_type_id', 2)->where('is_published', 1)->orderBy('id', 'desc')->take(4)->get();
            $allcats = Category::where('parent_id', '<>',null)->get();

            //\App\Models\Visit::log(\App\Models\Tag::class,$tagobj->id);

            $title="Search Result";
            $description="";

            return view('categoryBlogs', compact('allPostsByCat', 'title','description', 'lastPosts', 'allcats'));

        }
        return view('welcome', compact('allSlider'));
    }
    
}

?>
