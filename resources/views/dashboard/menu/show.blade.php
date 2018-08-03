@extends('layouts.admin')
@section('content')
<div class="form-horizontal">
        <div class="form-group">
            <label class="control-label col-md-2">Title</label>
            <div class="col-md-10">
              {{$data->name}}
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2">Location</label>
            <div class="col-md-10">
                {{$data->location}}
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-2">Links</label>
            <div class="col-md-10">
                <ul>
                  @foreach($data->Links as $link)
                      <li>{{$link->title}} ({!! ($link->category_id>0)?"<span style='color:red'>Category</span>":"<span style='color:blue'>Custom</span>"!!})</li>
                  @endforeach
              </ul>
            </div>
        </div>


    </div>


@stop
