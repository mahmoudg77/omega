@extends('layouts.admin')
@section('title',$data->title)
@section('content')
<section class="cat-dashboard">
<div class="panel panel-default">
<!--
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Edit Category :: {{ $data->title }}</h3>
    </div>
-->
    <div class="panel-body">
        <h2 class="post-heading">Edit Category: <small>{{$data->title}}</small></h2>
      <div class="ro-w">
        {!! Form::open(['method'=>'PATCH', 'route'=>["cp.category.update",$data->id]]) !!}
        <ul class="nav nav-tabs">
          @foreach(config('translatable.locales') as $key)
          <li class="{{($key==app()->getLocale())?'active':''}}"><a data-toggle="tab" href="#data_{{$key}}">{{$key}}</a></li>
          @endforeach
        </ul>
        <div class="tab-content">
          @foreach(config('translatable.locales') as $key)
          <div id="data_{{$key}}" class="tab-pane fade in {{($key==app()->getLocale())?'active':''}}">
          <div class="form-group col-sm-6">
            {!! Form::label('Title') !!}
            {!! Form::text($key.'[title]', ($data->translate($key)!=null?$data->translate($key)->title:null), array('required', 'class'=>'form-control', 'placeholder'=>'Ad new title ....')) !!}
          </div>
          <div class="form-group col-sm-12">
            {!! Form::label('Description') !!}
            {!! Form::textarea($key.'[description]',($data->translate($key)!=null?$data->translate($key)->description:null), array('required', 'class'=>'form-control editor ','id'=>$key.'_editor')) !!}
          </div>
        </div>
        @endforeach
        <div class="form-group col-sm-6">
          {!! Form::label('Parent?') !!}
          {!! Form::select('parent_id',
                          App\Models\Category::where('parent_id',0)->orWhereNull('parent_id')->listsTranslations('title')->pluck('title','id'),
                          ($data->Parent)?$data->Parent->id:null,
                          array('class'=>'form-control','placeholder'=>'Root')) !!}
        </div>


        <hr/>
        <div class="model-footer form-group col-sm-12" style="">
            {!! Form::submit('Update', array('class'=>'btn btn-success pull-right')) !!}
        </div>
      {!! Form::close() !!}
      </div>
    </div>
    </div>
</section>
@stop
