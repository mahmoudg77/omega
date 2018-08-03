
@extends('layouts.admin')
@section('content')
<div class="">
  <a class="btn btn-success pull-right addnew" 
     href="{{route('cp.menu-link.create',['m'=>$m,'curr_menu'=>$sel_menu])}}">Create New</a>
  <div class="clearfix"></div>
    <hr>
</div>
  <div class="list-group" >
      @foreach($data as $item)
      @if(count($item->Links)>0)
        <a href="#{{$item->id}}" class="list-group-item" data-toggle="collapse">
          <i class="glyphicon glyphicon-chevron-right"></i>{!!  $item->title!!} ({!! ($item->category_id>0)?"<span style='color:red'>Category</span>":"<span style='color:blue'>Custom</span>"!!})
        </a>
      @else
        <div class="list-group-item">{!! $item->title!!} ({!! ($item->category_id>0)?"<span style='color:red'>Category</span>":"<span style='color:blue'>Custom</span>"!!})
          <div class="col col-sm-6 pull-right">
             {!!Func::actionLinks('menu-link',$item->id,".list-group-item",["edit"=>['class'=>"edit"],"delete"=>['class'=>""],"view"=>['class'=>"view"]])!!}
          </div>
            <div class="clearfix"></div>
        </div>
      @endif
      @if(count($item->Links)>0)
        <div class="list-group collapse" id="{{$item->id}}">
          @foreach($item->Links as $link)
          <div  class="list-group-item">{!! $link->title!!} ({!! ($link->category_id>0)?"<span style='color:red'>Category</span>":"<span style='color:blue'>Custom</span>"!!})
              <div class="col col-sm-6 pull-right">
                {!!Func::actionLinks('menu-link',$link->id,".list-group-item",["edit"=>['class'=>"edit"],"delete"=>['class'=>""],"view"=>['class'=>"view"]])!!}
            </div>
              <div class="clearfix"></div>
          </div>
          @endforeach
        </div>
      @endif
      @endforeach
    </div>

@endsection
@section('css')
<style>
.just-padding {
  padding: 15px;
}

.list-group.list-group-root {
  padding: 0;
  overflow: hidden;
}

.list-group.list-group-root .list-group {
  margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
  border-radius: 0;
  border-width: 1px 0 0 0;

}

.list-group.list-group-root > .list-group-item:first-child {
  border-top-width: 0;
}

.list-group.list-group-root > .list-group > .list-group-item {
  padding-left: 30px;
}

.list-group.list-group-root > .list-group > .list-group > .list-group-item {
  padding-left: 45px;
}

.list-group-item .glyphicon {
  margin-right: 5px;
}
</style>
@endsection
