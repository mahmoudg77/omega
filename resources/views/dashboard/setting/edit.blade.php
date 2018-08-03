@extends('layouts.admin')
@section('content')

    <section class="post-dashboard">

        <div class="container">
            <div class="row">
                {{Form::model(null, ['route'=>["cp.setting.update"],"method"=>"PUT","enctype"=>"multipart/form-data"])}}
                <div class="col col-xs-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="overflow: hidden">

                        <ul class="nav nav-tabs pull-left">

                            @foreach(config('translatable.locales') as $key)
                                <li class="{{($key==app()->getLocale())?'active':''}}">
                                    <a data-toggle="tab"
                                       href="#{{$key}}_setting">{{$key}}</a>
                                </li>
                            @endforeach

                        </ul>
                            <input class="btn btn-success pull-right" type="submit" name="submit" value="Save"/>
                        </div>
                        <div class="panel-body">

                    <div class="tab-content">
                        @foreach(config('translatable.locales') as $key)
                            <div id="{{$key}}_setting" class="tab-pane fade in {{app()->getLocale()==$key?'active':''}}" >



                    <div class="panel-group" id="{{$key}}_accordion">
                        @foreach(App\Models\Setting::select('group')->distinct()->get() as $g)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="{{$key}}_accordion" href="#{{$key}}_collapse_{{str_replace(" ","-",$g->group)}}">
                                            {{$g->group}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$key}}_collapse_{{str_replace(" ","-",$g->group)}}" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <table class='table borderless'>
                                        @foreach($data as $setting)

                                            <!-- Setting Item -->
                                            @if($setting->group==$g->group)
                                                @php $value=$setting->translate($key)?$setting->translate($key)->value:null; @endphp

                                                <tr><input type='hidden' name='id[]' value="<?=$setting->id?>"/>
                                                    <td width="180px;"  class='xtr'> <?=$setting->name?></td>
                                                    <td class='xtd'>

                                                        @if($setting->type==1)
                                                            <input class="form-control" type="text" name="setting[{{$setting->id}}][{{$key}}][value]" value="<?=$value?>"/>
                                                        @elseif($setting->type==2)
                                                            <input    type="text" class="date form-control" name="setting[{{$setting->id}}][{{$key}}][value]"  value="<?=$value?>" />
                                                        @elseif($setting->type==3)
                                                            <select  class="form-control"   name="setting[{{$setting->id}}][{{$key}}][value]"  >
                                                                <option value="1" <?=(( $value=="1")?"selected":"")?>>Yes</option>
                                                                <option value="0" <?=(( $value=="0")?"selected":"")?>>No</option>
                                                            </select>
                                                        @elseif($setting->type==4)
                                                            @php $avs=null;
                                                            if(strrpos($setting->availables,"{")===false){
                                                                foreach(explode("|",$setting->availables) as $i){
                                                                    $avs[]=array("key"=>$i,"value"=>$i);
                                                                }
                                                            }
//
                                                            @endphp

                                                        @elseif($setting->type==5)
                                                            @if(strrpos($setting->availables,"{")===false)
                                                                @foreach(explode("|",$setting->availables) as $i)
                                                                    <?php $avs[]=array("key"=>$i,"value"=>$i);?>
                                                                @endforeach
                                                            @endif

                                                        @elseif($setting->type==6)

                                                            <input   readonly type="text" class="form-control" name="setting[{{$setting->id}}][{{$key}}][value]" value="{{date("Y-m-d H:i:s")}}" />
                                                        @elseif($setting->type==7)
                                                            <textarea class="form-control" name="setting[{{$setting->id}}][{{$key}}][value]" >{{$value}}</textarea>
                                                        @elseif($setting->type==8)
                                                            <textarea class="form-control editor" id="textarea_{{$setting->id}}" name="setting[{{$setting->id}}][{{$key}}][value]" >{{$value}}</textarea>

                                                    @endif

                                                </tr>

                                            @endif
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                            </div>

                            @endforeach
                    </div>

                        </div>
                        </div>

</div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <style>
        .panel-heading .accordion-toggle:after {
            /* symbol for "opening" panels */
            font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
            content: "\e114";    /* adjust as needed, taken from bootstrap.css */
            float: right;        /* adjust as needed */
            color: grey;         /* adjust as needed */
        }
        .panel-heading .accordion-toggle.collapsed:after {
            /* symbol for "collapsed" panels */
            content: "\e080";    /* adjust as needed, taken from bootstrap.css */
        }

    </style>
@stop
