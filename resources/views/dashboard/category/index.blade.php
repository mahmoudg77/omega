
@extends('layouts.admin')
@section('content')
<div class="panel panel-default" style="margin-bottom:10px">
    <div class="panel-body" style="padding:7px">
        <a class="btn btn-success pull-right" href="{{route('cp.category.create',['curr_menu'=>$sel_menu])}}">Create New</a>
    </div>
</div>

<div class="panel panel-default cat-dashboard">
    <div class="panel-body">
        <div class="list-group" >
          @foreach($data as $item)
          @if(count($item->Chields)>0)
            <div class="list-group-item">
                <div class="row">
                    <a href="#{{$item->id}}" class="col-sm-8" data-toggle="collapse" style="color: #555;text-decoration: none;">
                        {{$item->title}} <i class="glyphicon glyphicon-chevron-right" style="font-size: 12px;"></i></a>
                    <div class="col-sm-4 pull-right">
                        {!!Func::actionLinks('category',$item->id,".list-group-item",['edit'=>['class'=>'edit'],'view'=>['class'=>'view']])!!}
                    </div>
                </div>
            </div>
          @else
            <div class="list-group-item">
                <div class="row">
                  <div class="col-sm-8">{{$item->title}}</div>
                  <div class="col-sm-4 pull-right">
                     {!!Func::actionLinks('category',$item->id,".list-group-item",['edit'=>['class'=>''],'view'=>['class'=>'view']])!!}
                  </div>
                </div>
            </div>
          @endif

          @if(count($item->Chields)>0)
            <div class="list-group collapse" id="{{$item->id}}">
              @foreach($item->Chields as $subitem)
              <div  class="list-group-item">
                  <div class="row">
                      <div class="col-sm-8">&nbsp;&nbsp; {{$subitem->title}}</div>
                      <div class="col-sm-4 pull-right">
                        {!!Func::actionLinks('category',$subitem->id,".list-group-item",['edit'=>['class'=>''],'view'=>['class'=>'view']])!!}
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
          @endif

          @endforeach
        </div>
    </div>
</div>


@endsection
@section('css')
@endsection
