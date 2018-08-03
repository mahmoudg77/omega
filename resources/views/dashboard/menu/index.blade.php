
@extends('layouts.admin')
@section('content')
<section class="post-dashboard">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body" style="padding: 7px;">
                <a class="btn btn-success pull-right" href="{{route('cp.menu.create',['curr_menu'=>$sel_menu])}}">Create New</a>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body" style="padding: 7px;">
                <table class="table datatable">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th></th>
                      </tr>
                    </thead>
                    @foreach($data as $item)
                      <tr>
                          <td>{{$item->name}}</td>
                          <td>{{$item->location}}</td>
                          <td>
                              {!!Func::actionLinks('menu',$item->id,"tr",['view'=>['class'=>'view']])!!}
                          </td>
                      </tr>
                    @endforeach
                  </table>
            </div>
        </div>
    </div>
</section>
@endsection
