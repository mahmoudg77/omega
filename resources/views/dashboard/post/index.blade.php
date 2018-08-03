
@extends('layouts.admin')
@section('content')
<section class="post-dashboard">
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 7px;">
            <a class="btn btn-success btn-sm pull-right" href="{{route('cp.posts.create',['type'=>$post_type_id,'curr_menu'=>$sel_menu])}}">
          Create New</a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover table-striped datatable-ajax">
                <thead>
                  <tr>
                      <th>Image</th>
                    <th>Title</th>
                    <th>Created Date</th>
                    <th>Publish Date</th>
                    <th >Author</th>
                    <th>File</th>
                    <th>Visits</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                {{--@foreach($data as $post)--}}
                  {{--<tr>--}}
                      {{--<td><img src="{{$post->mainImage()}}" class="img-responsive" width="100px"/></td>--}}
                      {{--<td>{{$post->title}}</td>--}}
                      {{--<td>{{$post->created_at}}</td>--}}
                      {{--<td>{{$post->pub_date}}</td>--}}
                      {{--<td>{{$post->Creator!=null?$post->Creator->name:null}}</td>--}}
                      {{--<td>--}}
                          {{--<a href="#" title="Publish/UnPublish Post" data-id="{{$post->id}}" class="btn btn-default {{($post->is_published)?"unpublish":"publish"}}"><span class="glyphicon glyphicon-globe {{($post->is_published)?"text-success":"text-danger"}}"></span></a>--}}
                      {{--</td>--}}
                      {{--<td>{{$post->Visits()->count()}}</td>--}}
                      {{--<td>@if($post->mainFile())<a href="/uploads/files/{{$post->mainFile()}}">Download</a>@endif</td>--}}
                      {{--<td>--}}
                          {{--<div class="btn-group">{!!Func::actionLinks('posts',$post->id,"tr",["view"=>['class'=>"view1","target"=>"_blank",'href'=>"/".app()->getLocale()."/".$post->slug]])!!}</div>--}}
                      {{--</td>--}}

                  {{--</tr>--}}
                {{--@endforeach--}}

              </table>
        </div>
    </div>
</div>
</section>
@endsection

@section('js')
<script>
$(function(){
  $("body").on("click",".publish",function(e){
      e.preventDefault();
      var $this=$(this);
      $.ajax({
            headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
            url:"{{route('cp.post-publish')}}",
            type:"post",
            dataType:"json",
            data:{id:$this.data("id")},
            beforeSubmit:function(){
              return confirm("Are you sure you want to publish this post?");
            },
            success:function(d, statusText, xhr,form){
              if(d.type=="success"){
                  Success(d.message);
                  $this.toggleClass("publish");
                  $this.toggleClass("unpublish");
                  $this.find("span").toggleClass("text-danger");
                  $this.find("span").toggleClass("text-success");
              }else{
                  Error(d.message);
              }
            },
            error: function (data, status, xhr) {
                Error( data.status + " " + xhr);
            }
      });
  });
    $("body").on("click",".unpublish",function(e){
        e.preventDefault();
        var $this=$(this);
        $.ajax({
            headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
            url:"{{route('cp.post-unpublish')}}",
            type:"post",
            dataType:"json",
            data:{id:$this.data("id")},
            beforeSubmit:function(){
                return confirm("Are you sure you want to un-publish this post?");
            },
            success:function(d, statusText, xhr,form){
                if(d.type=="success"){
                    Success(d.message);
                    $this.toggleClass("publish");
                    $this.toggleClass("unpublish");
                    $this.find("span").toggleClass("text-danger");
                    $this.find("span").toggleClass("text-success");
                 }else{
                    Error(d.message);
                }
            },
            error: function (data, status, xhr) {
                Error( data.status + " " + xhr);
            }
        });
    });

    $(".datatable-ajax").DataTable({
            processing: true,
            serverSide: true,
            ajax: {headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},url:'{{ route('cp.posts.datatable',['type'=>$post_type_id,'curr_menu'=>$sel_menu]) }}',type:"POST"},

            columns: [
                { data: 'image', name: 'image',orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'created_at', name: 'created_at' },
                { data: 'pub_date', name: 'pub_date' },
                { data: 'creator', name: 'creator' },
                { data: 'file', name: 'file',orderable: false, searchable: false },
                { data: 'visits', name: 'visits' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action',orderable: false, searchable: false },
            ],
            buttons: ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],

        });

});
</script>

@endsection
