@extends('layouts.plane')

@section('pageTitle')
Reset Password | WeiCrowd
@endsection
@section('metaName')
ROBOTS
@endsection

@section('metaContent')
NOINDEX, NOFOLLOW
@endsection

@section('content')
<div id="container" class="dashboard-area">

<section class="register_page">
    <div class="container">
        <div class="row">
  @if(@$errors->first('resetError'))
 <div class="flash-message" id="iframeMessage">  
    <div class="admin-alert-msg alert alert-success" style="display:none;z-index: 1000 !important;" id="customSuccessFlash" ><span></span><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    
    <div class="admin-alert-msg alert alert-danger  text-center">{{@$errors->first('resetError')}} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    
    
</div>
            @endif

<div class="dashboard-content">
            <div class="login-form-wrap text-center">
                <a href="{{ url('/')}}" class="logo"><img width="220" src="{{ asset('content/images/logo-alt.svg') }}" alt="Logo" /></a>
                <div class="box login-box">
                    <h1 class="box-heading">Reset Password</h1>   
                    
            <div class="form">
                            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}" autocomplete="off">
                            {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                            {{ Form::text('email', old('email'), ['class' => 'form-control','placeholder'=>'Email','id'=>'email']) }}
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                            {{ Form::password('password', ['class' => 'form-control','placeholder'=>'Password' , 'id' => 'password']) }}
                             <div class="info-alert">
                                <i class="fa fa-info"></i>
                                <div class="box-contant">
                                  This field should contain min 8 and max 15 characters with atleast 1 number, 1 alphabet, and 1 special character except .(dot), _(underscore), -(hyphen), ~(tilde).
                                </div>
                            </div>
                             <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                            
                    <div class="form-group">
                            {{ Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>'Confirm Password' , 'id' => 'password-confirm']) }}
                                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                       
                    </div>
                                        
                        <div class="form-group">
                            <input type="submit" class="primary-btn theme2-btn marB20 full-width" value="Reset Password" class="form-control"/>
                        
                    </div>  
                </form>
            </div>
            </div>
            </div>
            </div>
            
        </div>
    </div>
</section>
</div>
@endsection


@section('css')
<style>
  .box-contant {
    position: absolute;
    right: -323px;
    top: -12px;
    display: none;
    border: solid 1px #ddd;
    background: #FFF;
    padding: 10px;
    min-height: 60px;
    transition: all 0.5s;
    box-shadow: 0 0 10px #eee;
    left: auto;
    width: 320px;
        z-index: 99;
}
.info-alert{ position: absolute;
    top: 12px;
    right: 10px;}
 .info-alert i.fa.fa-info {
    border: solid 1px #ddd;cursor: pointer;
    width: 22px;
    height: 22px;
    border-radius: 100px;
    line-height: 21px;
   
}
.info-alert:hover .box-contant{display: block}
</style>
@endsection