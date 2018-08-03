
 <div class="single-sidebar" style="clear:both;">
    <div class="single-cat">
        <h4>{{trans('app.categories')}}</h4>
        <ul class="list-group">
            @foreach($allcats as $cat)
                <li class="list-group-item">
                    <a href="{{route('categoryBySlug', $cat->slug)}}">{{ $cat->title}}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="single-cat">
        <h4>{{trans('app.last articles')}}</h4>
        <ul class="list-group">
            @foreach($lastPosts as $lastpost)
                <li class="list-group-item">
                    <a href="{{ route('getPostBySlug', $lastpost->slug)}}">{{ $lastpost->title}}</a>
                </li>
            @endforeach
        </ul>
    </div>
     @if(Setting::getIfExists('show_fb_posts_sitebar',false))
        <div class="hidden-xs">
         <div class="single-cat">
             <h4>{{trans('app.follow facebook')}}</h4>
             <ul class="list-group">
                 <div class="fb-page" data-href="{{Setting::getIfExists('facebook','https://www.facebook.com/sffece/')}}"
                      data-tabs="timeline" data-small-header="false" data-adapt-container-width="true"
                      data-hide-cover="false" data-show-facepile="true">
                     <blockquote cite="{{Setting::getIfExists('facebook','https://www.facebook.com/sffece/')}}" class="fb-xfbml-parse-ignore"></blockquote></div>
             </ul>
         </div>
            </div>
     @endif

</div>
