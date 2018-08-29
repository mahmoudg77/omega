<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class CatServicesController extends Controller
{

    public function getAllServices(){
        //$category = \App\Models\Category::where('slug', $slug)->first();
        
        $allServices = Post::where('is_published',1)->where('post_type_id', 2)->orderBy('id', 'desc')->get();
        
        \App\Models\Visit::log("HomePage",0);
        
        return view('services', compact('allServices'));
    }
    
}

?>