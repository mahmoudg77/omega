@extends('layouts.admin')
@section('title', 'Create Category')
@section('content')

  <div class="panel panel-default" style="width:700px;max-width: 100%;">
<!--
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Add New Category</h3>
    </div>
-->

    <div class="modal-body">
      <div class="row">
      {!! Form::open(['method'=>'POST', 'route'=>["cp.category.store"],"enctype"=>"multipart/form-data","class"=>"ajax--form"]) !!}
      <ul class="nav nav-tabs">
        @foreach(config('translatable.locales') as $key)
        <li class="{{($key==app()->getLocale())?'active':''}}"><a data-toggle="tab" href="#data_{{$key}}">{{$key}}</a></li>
        @endforeach

      </ul>

      <div class="tab-content">
        @foreach(config('translatable.locales') as $key)
        <div id="data_{{$key}}" class="tab-pane fade in {{($key==app()->getLocale())?'active':''}}">
          <div class="form-group col-sm-6">
            {!! Form::label('Title ('.$key.')') !!}
            {!! Form::text($key.'[title]', null, ['required', 'class'=>'form-control', 'placeholder'=>'Add new title ....']) !!}
          </div>

          <div class="form-group col-sm-12">
            {!! Form::label('Description ('.$key.')') !!}
            {!! Form::textarea($key.'[description]', null, ['required', 'class'=>'form-control editor','id'=>$key.'_editor','placeholder'=>'Add description ....']) !!}
          </div>
        </div>
        @endforeach

      </div>
      <div class="form-group  col-sm-12">
              <label class="control-label col-md-2">Image</label>
              <div class="col-md-10">
                  {{Form::file("image",['accept'=>'.jpg,.png,.gif,.jpeg'])}}
              </div>
          </div>
          <div class="form-group  col-sm-12">
                    <label class="control-label col-md-2">fa icon</label>
                    <div class="col-md-10">
                        {{Form::text("icon",null,array( 'class'=>'form-control iconPicker', 'placeholder'=>'Icon class name ....'))}}
                    </div>
                </div>
            
        <div class="form-group  col-sm-12">
        <label class="control-label col-md-2">Parent?</label>
                  <div class="col-md-10">
        {!! Form::select('parent_id',
                        App\Models\Category::where('parent_id',0)->orWhereNull('parent_id')->listsTranslations('title')->pluck('title','id'),null,['class'=>'form-control','placeholder'=>'Root']) !!}
              </div>
      </div>


        <hr/>
        <div class="model-footer form-group col-sm-12">
            {!! Form::submit('Add New', array('class'=>'btn btn-primary pull-right')) !!}
        </div>
      {!! Form::close() !!}
      </div>
    </div>

  </div>

@endsection
@section('css')
    <link href="{{ asset('cp/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet" />
@endsection
@section('js')

    <!-- fontIconPicker JS -->
    <script type="text/javascript" src="{{ asset('cp/js/fontawesome-iconpicker.min.js')}}"></script>
    <script>
        $(function(){
            $('.iconPicker').iconpicker();
        });
    </script>
@stop