
@extends('layouts.admin')
@section('content')
<section class="user-dashboard">
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 7px;">
            <a class="btn btn-success pull-right" href="{{route('cp.user.create',['curr_menu'=>$sel_menu])}}">Create New</a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body" style="padding: 7px;">
            <table class="table datatable-ajax">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Email</th>
                    <th>Register Date</th>
                      @foreach (\App\Models\PostType::all() as $postType)
                          <th>{{$postType->name}}</th>
                      @endforeach
                    <th></th>
                  </tr>
                </thead>
                {{--@foreach($data as $item)--}}
                  {{--<tr>--}}
                      {{--<td>{{$item->name}}</td>--}}
                      {{--<td>{{$item->email}}</td>--}}
                      {{--<td>{{$item->AccountLevel->name}}</td>--}}
                      {{--<td>{{$item->created_at}}</td>--}}
                       {{--<td>--}}
                          {{--{!!Func::actionLinks('user',$item->id,"tr",["edit"=>['class'=>"edit"],"view"=>['class'=>"view"]])!!}--}}
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


        $(".datatable-ajax").DataTable({
            processing: true,
            serverSide: true,
            ajax: {headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},url:'{{ route('cp.user.datatable',['curr_menu'=>$sel_menu]) }}',type:"POST"},

            columns: [
                { data: 'name', name: 'name' },
                { data: 'account_level', name: 'account_level' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
                    @foreach (\App\Models\PostType::all() as $postType)
                { data: '{{$postType->name}}', name: '{{$postType->name}}' },
                    @endforeach
                { data: 'action', name: 'action',orderable: false, searchable: false },

            ],
            buttons: ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],

        });

    })
</script>
@endsection
