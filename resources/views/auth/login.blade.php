@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row login-page">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
<!--                <div class="panel-heading">Login</div>-->
<h1 class="text-center"><i class="fa fa-user"></i> {{trans ('app.login')}}</h1>
                <div class="panel-body">
                   
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{trans('app.email')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('app.remember')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12 col-md--offset-4 text-center">
                                <button type="submit" class="btn btn-primary btn-sm">{{trans ('app.login')}}</button>
                                <a href="{{ route('fp.register') }}" class="btn btn-primary btn-sm">{{trans ('app.login facebook')}} <i class="fa fa-facebook"></i></a>
                                <a href="{{ route('tw.register') }}" class="btn btn-info btn-sm">{{trans ('app.login twitter')}} <i class="fa fa-twitter"></i></a>

                                
                            </div>
                        </div>
                        <hr/>
                        
                        <div class="col-xs-12">
                            <div class="pull-right">
                                <a class="" href="{{ route('password.request') }}">{{trans ('app.forgot-password')}} 
                                    <i class="fa fa-unlock-alt"></i></a>
                            </div>
                            <div class="pull-left">
                                {{trans ('app.new-account')}} ! 
                                <a href="{{ route('register') }}" style="padding: 0 10px;"><i class="fa fa-user-plus"></i> {{trans('app.register')}}</a>
                            </div>
                            
                        </div> 

<!--
                        <div class="form-group">
                          <label for="password-confirm" class="col-md-4 control-label"></label>
                          <a href="/facebook" class="btn btn-primary btn-sm">Login with Facebook</a>
                          <a href="/twitter" class="btn btn-success btn-sm">Login with Twitter</a>
                        </div>
-->

                    </form>
                    
                    
                    
                </div>
            </div>
            
            
        </div>
    </div>
</div>
@endsection
