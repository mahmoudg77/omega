@extends('layouts.admin')
@section('content')
<section class="cat-dashboard">
<div class="panel panel-default">
    <div class="panel-body">
        <h2 class="post-heading">Show Category: <small>{{$data->title}}</small></h2>
        <div class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-md-2">Title</label>
                <div class="col-md-10">
                  {{$data->title}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Parent</label>
                <div class="col-md-10">
                  @if($data->Parent){{$data->Parent->title}}@endif
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">Clields</label>
                <div class="col-md-10">
                    <ul>
                      @foreach($data->Chields as $cat)
                          <li>{{$cat->title}}</li>
                      @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@stop
