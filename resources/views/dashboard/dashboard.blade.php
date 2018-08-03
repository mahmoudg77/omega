@extends('layouts.admin')
@section('content')
<!-- Website Overview -->
<div class="panel panel-default" groups="admin">
  <div class="panel-heading main-color-bg">
    <h3 class="panel-title">Website Overview</h3>
  </div>
  <div class="panel-body">
    <div class="col-md-3">
      <div class="well dash-box">
        <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{App\User::all()->count()}}</h2>
        <h4>Users</h4>
      </div>
    </div>
    <div class="col-md-3">
      <div class="well dash-box">
        <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{App\Models\Post::where('post_type_id',3)->count()}}</h2>
        <h4>Research</h4>
      </div>
    </div>
    <div class="col-md-3">
      <div class="well dash-box">
        <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{App\Models\Post::where('post_type_id',2)->count()}}</h2>
        <h4>Posts</h4>
      </div>
    </div>
    <div class="col-md-3">
      <div class="well dash-box">
        <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> {{App\Models\Visit::count()}}</h2>
        <h4>Visits</h4>
      </div>
    </div>
  </div>
</div>
  <!-- Latest Users -->
<div class="panel panel-default" groups="admin">
    <div class="panel-heading">
      <h3 class="panel-title">Latest Users</h3>
    </div>
    <div class="panel-body">
      <table class="table table-striped table-hover">
         <thead><tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Joined</th>
          </tr>
         </thead>
        @foreach(App\User::orderBy('id','desc')->take(5)->get() as $usr)
        <tr>
            <td>{{$usr->name}}</td>
            <td>{{$usr->email}}</td>
            <td>{{$usr->AccountLevel?$usr->AccountLevel->name:'None'}}</td>
            <td>{{$usr->created_at}}</td>

        </tr>
        @endforeach

        </table>
    </div>
  </div>


  <!-- User area-->
<div class="panel panel-default" groups="subscribe">
  <div class="panel-heading main-color-bg">
    <h3 class="panel-title">Research Overview</h3>
  </div>
  <div class="panel-body">
    <div class="col-md-4">
      <div class="well dash-box">
        <h2><i class="fa fa-check" aria-hidden="true"></i> {{App\Models\Post::where('post_type_id',3)->where('is_published',1)->count()}}</h2>
        <h4>Approved</h4>
      </div>
    </div>
    <div class="col-md-4">
      <div class="well dash-box">
        <h2><i class="fa fa-times" aria-hidden="true"></i> {{App\Models\Post::where('post_type_id',3)->where('is_published',0)->count()}}</h2>
        <h4>Rejected</h4>
      </div>
    </div>
    <div class="col-md-4">
      <div class="well dash-box">
        <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{App\Models\Post::where('post_type_id',3)->whereNull('is_published')->count()}}</h2>
        <h4>Waiting</h4>
      </div>
    </div>
    <!--<div class="col-md-4">-->
    <!--  <div class="well dash-box">-->
    <!--    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 22</h2>-->
    <!--    <h4>Comments</h4>-->
    <!--  </div>-->
    <!--</div>-->
  </div>
</div>

<!-- Latest Users -->
<div class="panel panel-default" groups="subscribe">
  <div class="panel-heading">
    <h3 class="panel-title">Latest Research</h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover">
      <thead><tr>
        <th>Title</th>
        <th>Magazine</th>
        <th>Date</th>
        <th>File</th>
        <th>Status</th>
      </tr>
      </thead>
      @foreach(App\Models\Post::where('post_type_id',3)->orderBy('id','desc')->take(5)->get() as $post)
        <tr>
          <td>{{$post->title}}</td>
          <td>{{$post->Category->title}}</td>
          <td>{{$post->created_at}}</td>
          <td>@if($post->mainFile())<a href="/uploads/files/{{$post->mainFile()}}">Download</a>@endif</td>
          <td>@if($post->is_published===0 || $post->is_published===1)
              <span class="glyphicon glyphicon-thumbs-{{($post->is_published>0)?"up":"down"}} text-{{($post->is_published>0)?"success":"danger"}}"></span>
                @else
              <span class="glyphicon">--</span>
            @endif</td>

        </tr>
      @endforeach

    </table>
  </div>
</div>



@stop
