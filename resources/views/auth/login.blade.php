@extends('layouts.plane')

@section('content')


    <!-- Container -->
    <div id="container" class="dashboard-area">
<div class="flash-message" id="iframeMessage">  
                        <div class="admin-alert-msg alert alert-success" style="display:none;z-index: 1000 !important;" id="customSuccessFlash" ><span></span><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <div class="admin-alert-msg alert alert-{{ $msg }}  text-center">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                        @endif
                        @endforeach
                    </div>
        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="login-form-wrap text-center">
                <a href="{{ url('/')}}" class="logo"><img width="220" src="content/images/logo-alt.svg" alt="Logo" /></a>

                <!-- Box -->
                <div class="box login-box">
                    <h1 class="box-heading">Login</h1>
                    @if(@$errors)
                    <p class="text-danger"><strong>{{ $errors->first('error_msg') }}</strong></p>
                    @endif
                    <!-- Form -->
                        {{ Form::open(['method' => 'POST','autocomplete'=>'off', 'url'=> route('login'),  'class'=>'form-horizontal']) }}
                        {{ csrf_field() }}
                    <div class="form">
                        <div class="form-group">
                            {{ Form::text('email', '', ['class' => 'form-control','placeholder'=>Lang::get('common.Email'),'id'=>'email']) }}
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            {{ Form::password('password', ['class' => 'form-control','placeholder'=>Lang::get('common.Password') , 'id' => 'password']) }}
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            
                            <div class="text-right marT5">
                                <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                        </div>
                        
                      <div class="form-group">
                            <div class="marB20"><img src="{{ captcha_src() }}" alt="captcha" class="captcha-image" data-refresh-config="default"></div>
                            <span class="captcha-img text-success pull-right marB20" style="cursor:pointer;" data-refresh-config="default"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Refresh Captcha</span>
                            <input type="text" name="captcha" class="form-control" placeholder = "Enter Text Here!">
                            <span class="text-danger">{{ $errors->first('captcha') }}</span>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <button type="submit" class="primary-btn theme2-btn marB20 full-width">
                                    Login
                                </button>
                            
                            
<!--                            <small class="form-note">Signing up signifies you have read and agree to our <a class="text-link" href="#" target="_blank">Terms of Service</a> and <a class="text-link" href="#" target="_blank">Privacy Policy</a></small>-->
                        </div>
                    </div>
                    </form>
                    <!-- Form -->

                </div>
                <!-- Box -->

                <p class="marB0 marT20">Don't have an account? <a href="{{ url('/icolisting')}}">Sign Up for Free</a></p>

            </div>
        </div>
        <!-- Dashboard Content -->


    </div>
    <!-- Container -->

   
@endsection

@section('jscript')
<script type="text/javascript">
 $('.captcha-img').on('click', function () {
    var captcha = $(this);
    var config = captcha.data('refresh-config');
    $.ajax({
        method: 'GET',
        url: '/get_captcha/' + config,
    }).done(function (response) {
        $(".captcha-image").prop('src', response);
    });
});
</script>
@endsection