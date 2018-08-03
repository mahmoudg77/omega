@extends('layouts.admin')
@section('title',$data->name)
@section('content')
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Edit Menu :: {{ $data->name }}</h3>
    </div>

    <div class="modal-body">
      <div class="r-ow" style="display: flow-root;">
        {!! Form::open(['method'=>'PATCH', 'route'=>["cp.menu.update",$data->id]]) !!}

        <div class="form-group col-sm-12">
            {!! Form::label('Name') !!}
            {!! Form::text('name', $data->name, array('required', 'class'=>'form-control', 'placeholder'=>'Ad new title ....')) !!}
          </div>


        <div class="form-group col-sm-12">
          {!! Form::label('Location') !!}
          {!! Form::text('location', $data->location, array('required', 'class'=>'form-control')) !!}
        </div>

        <hr/>
        <div class="model-footer form-group col-sm-12" style="">
            {!! Form::submit('Update', array('class'=>'btn btn-success pull-right')) !!}
        </div>
      {!! Form::close() !!}
      </div>
      <div class="ro-w" style="display: flow-root;">
        <h3>Links</h3>
        <hr/>
        <div id="divLinks" class="col col-xs-12">

        </div>
      </div>
    </div>
</div>
</div>
<script>
$(function(){
  $("#divLinks").load("{{route('cp.menu-link.index',['m'=>$data->id])}}");
});
</script>
@stop
