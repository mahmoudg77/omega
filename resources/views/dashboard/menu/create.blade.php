@extends('layouts.admin')
@section('title', 'Create Menu')
@section('content')

  <div class="panel panel-default" style="width:700px;max-width: 100%;">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Add New Menu</h3>
    </div>

    <div class="modal-body">
      <div class="row">
      {!! Form::open(['method'=>'POST', 'route'=>["cp.menu.store"]]) !!}



        <div class="form-group col-sm-6">
          {!! Form::label('Name') !!}
          {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Ad new title ....')) !!}
        </div>



        <div class="form-group col-sm-12">
          {!! Form::label('Location') !!}
          {!! Form::text('location', null, array('required', 'class'=>'form-control', 'placeholder'=>'Add location ....')) !!}
        </div>
        <hr/>
        <div class="model-footer form-group col-sm-12">
            {!! Form::submit('Add New', array('class'=>'btn btn-primary pull-right')) !!}
        </div>
      {!! Form::close() !!}
      </div>
    </div>

  </div>

@stop
