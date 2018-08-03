@extends('layouts.admin')
@section('title',$data->title)
@section('content')

<div class="panel panel-default" style="width:700px;max-width: 100%;">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Edit link :: {{ $data->title }}</h3>
    </div>

    <div class="modal-body">
      <div class="row">
        {!! Form::open(['method'=>'PATCH', 'route'=>["cp.menu-link.update",$data->id]]) !!}
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
        </div>
        @endforeach
        </div>
          <div class="form-group col-sm-6">
            {!! Form::label('Type') !!}
            {!! Form::select('type', ['Custom Link','Category'],($data->category_id>0?1:0), array('required', 'class'=>'form-control', 'placeholder'=>' ....')) !!}
          </div>
          <div class="form-group col-sm-6">
              {!! Form::label('Parent') !!}
              {!! Form::select('parent_id',App\Models\MenuLink::where('menu_links.id','<>',$data->id)->where('menu_links.menu_id',$data->menu_id)->listsTranslations('title')->pluck('title','menu_links.id'),null, array( 'class'=>'form-control', 'placeholder'=>'Root')) !!}
          </div>
          <div class="form-group col-sm-12">
            {!! Form::label('Link') !!}
            {!! Form::text('customlink', $data->customlink, array( 'class'=>'form-control', 'placeholder'=>'Add location ....')) !!}
          </div>
          <div class="form-group col-sm-12">
             {!! Form::label('Category') !!}  
             {!! Form::select("category_id",App\Models\Category::listsTranslations('title')->pluck('title','id'),$data->category_id,['class'=>'form-control']) !!}
            
         </div>
         
         <div class="form-group col-sm-12">
             {!! Form::label('Include chileds') !!}
             {!! Form::select('hasSubs', ['0'=>'No','1'=>'Yes'],$data->hasSubs, array('class'=>'form-control')) !!}
         </div>

          <hr/>
          <div class="model-footer form-group col-sm-12">
            {{Form::hidden('menu_id',$data->menu_id)}}
              {!! Form::submit('Save', array('class'=>'btn btn-primary pull-right')) !!}
          </div>
      {!! Form::close() !!}
      </div>
    </div>
</div>
<script>
$(function(){
    $("select[name='type']").change(function(){
        console.log($(this));
        if($(this).val()==0){
            $("input[name='customlink']").closest(".form-group").show();
            $("select[name='category_id']").closest(".form-group").hide();
            $("select[name='hasSubs']").closest(".form-group").hide();
        }else{
            $("input[name='customlink']").closest(".form-group").hide();
            $("select[name='category_id']").closest(".form-group").show();
            $("select[name='hasSubs']").closest(".form-group").show();

        }
    }) ;
    $("select[name='type']").change();

});
</script>

@stop
