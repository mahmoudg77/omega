@extends('layouts.admin')
@section('title', 'Create Category')
@section('content')

  <div class="panel panel-default" style="width:700px;max-width: 100%;">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Add New User</h3>
    </div>
<?php/*`name`, `email`, `password`, `country`, `city`, `phone`,
        `active`, `created_by`, `updated_by`, `verified`,
        `email_token`, `remember_token`, `created_at`, `updated_at`, `account_level_id`*/ ?>
    <div class="modal-body">
      <div class="row">
      {!! Form::open(['method'=>'POST', 'route'=>["cp.user.store"]]) !!}

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
        <div class="model-footer form-group col-sm-12">
            {!! Form::submit('Add New', array('class'=>'btn btn-primary pull-right')) !!}
        </div>
      {!! Form::close() !!}
      </div>
    </div>

  </div>

@stop
