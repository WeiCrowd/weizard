@extends('layouts.plane')

@section('pageTitle')
Forgot Password | WeiZard 
@endsection

@section('metaName')
ROBOTS
@endsection

@section('pageMetaDes')
NOINDEX, NOFOLLOW
@endsection
@section('content')
<div id="container" class="dashboard-area">
<section class="register_page">
	<div class="container">
		<div class="row">
 <div class="flash-message" id="iframeMessage">  
    <div class="admin-alert-msg alert alert-success" style="display:none;z-index: 1000 !important;" id="customSuccessFlash" ><span></span><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <div class="admin-alert-msg alert alert-{{ $msg }}  text-center">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
    @endif
    @endforeach
</div>

<div class="dashboard-content">
            <div class="login-form-wrap text-center">
                <a href="{{ url('/')}}" class="logo"><img width="220" src="{{ asset('content/images/logo-alt.svg') }}" alt="Logo" /></a>
                <div class="box login-box">
                    <h1 class="box-heading">Forgot Password</h1>   
			<div class="form">
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}" autocomplete="off">
                                        {{ csrf_field() }}
					
					<div class="row form-group">
						<div class="col-sm-12">
							{{ Form::text('email', '', ['class' => 'form-control','placeholder'=>'Email','id'=>'email']) }}
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
						</div>						
					</div>
                                        <div class="row form-group">
                                            <div class="col-sm-12">
                                            <div class="marB20"><img src="{{ captcha_src() }}" alt="captcha" class="captcha-image" data-refresh-config="default"></div>
                                            <span class="captcha-img text-success pull-right marB20" style="cursor:pointer;" data-refresh-config="default"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Refresh Captcha</span>
                                            <input type="text" name="captcha" class="form-control" placeholder = "Enter Text Here!">
                                            <span class="text-danger">{{ $errors->first('captcha') }}</span>
                                        </div>
                                              </div>
                                        
                                        <div class="row">
						<div class="col-sm-12">
							<input type="submit" class="primary-btn theme2-btn marB20 full-width" value="Send Password Reset Link" class="form-control"/>
						</div>						
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