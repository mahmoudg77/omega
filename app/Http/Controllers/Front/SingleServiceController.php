<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class SingleServiceController extends Controller
{
    public function getSingleService(){
        $allSlider = Post::where('is_published',1)->where('post_type_id', 4)->orderBy('id', 'desc')->get();
        
        \App\Models\Visit::log("HomePage",0);
        
        return view('singleService', compact('allSlider'));
    }
    
}

?>