@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Login</div>
                @if($errors->any())
                    <h5>{{$errors->first()}}</h5>
                @endif
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.auth') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required="">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">&nbsp;</label>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="g-recaptcha recaptcha-bx" data-sitekey="{{ env('CAPTCHA_SITEKEY') }}"></div>
                                        <span class="text-danger">{{ $errors->first('captcha') }}</span>
                                    </div>                      
                                </div> 
                            </div>        
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection