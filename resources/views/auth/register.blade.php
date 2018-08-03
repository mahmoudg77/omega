@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row register-page">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="text-center"><i class="fa fa-user-plus"></i> {{trans('app.register')}}</h1>
            <div class="panel panel-default">
<!--                <div class="panel-heading">Register</div>-->

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{trans('app.name')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{trans('app.email')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{trans('app.phone')}}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{trans('app.password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">{{trans('app.confirm password')}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2 text-center">
                                <button type="submit" class="btn btn-primary btn-sm">{{trans ('app.register')}}</button>
                                <a href="{{ route('fp.register') }}" class="btn btn-primary btn-sm">{{trans ('app.login facebook')}} <i class="fa fa-facebook"></i></a>
                                <a href="{{ route('tw.register') }}" class="btn btn-info btn-sm">{{trans ('app.login twitter')}} <i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                        
                        
<!--
                        <div class="form-group">
                          <label for="password-confirm" class="col-md-4 control-label"></label>
                          
                        </div>
-->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
