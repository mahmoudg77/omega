@extends('layouts.admin')
@section('title',$data->title)
@section('content')

<div class="panel panel-default" style="width:700px;max-width: 100%;">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Edit User :: {{ $data->name }}</h3>
    </div>

    <div class="modal-body">
      <div class="row">
        {{Form::model($data, ['route'=>["cp.user.update",$data->id],"method"=>"PUT"])}}

        <div class="form-group col-sm-6">
              {!! Form::label('Name') !!}
              {!! Form::text('name', null, ['required', 'class'=>'form-control', 'placeholder'=>'']) !!}
            </div>

            <div class="form-group col-sm-12">
              {!! Form::label('Email') !!}
              {!! Form::text('email', null, ['required', 'class'=>'form-control','type'=>'email', 'placeholder'=>'']) !!}
            </div>
            <div class="form-group col-sm-12">
              {!! Form::label('Country') !!}
              {!! Form::text('country', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
            </div>
            <div class="form-group col-sm-12">
              {!! Form::label('City') !!}
              {!! Form::text('city', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
            </div>
            <div class="form-group col-sm-12">
              {!! Form::label('Phone') !!}
              {!! Form::text('phone', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
            </div>

          <div class="form-group col-sm-6">
            {!! Form::label('Account Type?') !!}
            {!! Form::select('account_level_id', App\Models\AccountLevel::pluck('name','id'), null, array('class'=>'form-control', 'placeholder'=>'Select parent')) !!}
          </div>


        <hr/>
        <div class="model-footer form-group col-sm-12" style="">
            {!! Form::submit('Update', array('class'=>'btn btn-success pull-right')) !!}
        </div>
      {!! Form::close() !!}
      </div>
    </div>
</div>
@stop
