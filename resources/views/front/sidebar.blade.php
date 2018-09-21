<div class="resent">
    <h3 class="text-uppercase">{{trans('app.last articles')}}</h3>
    @if($cat=\App\Models\Category::where('slug',$slug)->first())
    @foreach($cat->Posts()->where('is_published',1)->orderBy('id','desc')->limit(4)->get() as $post)
        <div class="media">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="{{$post->mainImage()}}" alt="{{ $post->title}}" style="width:70px;">
                </a>
            </div>
            <div class="media-body">
                <a href="{{route('getPostBySlug', $post->slug) }}">{!! str_limit($post->body, 70) !!}</a>
                <h6>{{ $post->created_at!=null?$post->created_at->toDateString():'' }}</h6>
            </div>
        </div>
    @endforeach
   @endif
</div>

 <div class="resent">
    <h3>{{trans('app.tags')}}</h3>
    <ul class="tag">
        <li>
            {!! Func::tagLinks(implode(',',App\Models\Tag::select('name')->pluck('name')->all()))!!}
        </li>
    </ul>
</div>
