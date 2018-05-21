@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
        
                <div class="panel-heading">{{ Lang::get('common.edit_profile') }}</div>
                 
                <div class="panel-body">
                    
            {{ Form::open(['method' => 'POST','class'=>'form-horizontal','id'=>'validateProfileForm','autocomplete'=>'off', 'url'=> route('save_profile'), 'enctype' => 'multipart/form-data']) }}
            {{ Form::hidden('id', @Auth::id()) }}
            {{ csrf_field() }}
                     
            
                    
                    
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">{{ Lang::get('common.Name') }}</label>
                        <div class="col-md-6">
                            {{ Form::text('name',@Auth::user()->name, ['class' => 'form-control','placeholder'=>Lang::get('common.Name')]) }}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    
                    
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">{{ Lang::get('common.Email') }}</label>
                        <div class="col-md-6">
                            {{ Form::text('email',@Auth::user()->email, ['class' => 'form-control','readonly'=>'true','placeholder'=>Lang::get('common.Email')]) }}
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    
                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        <label for="mobile" class="col-md-4 control-label">{{ Lang::get('common.Mobile') }}</label>
                        <div class="col-md-6">
                            {{ Form::text('mobile',@Auth::user()->mobile, ['class' => 'form-control','placeholder'=>Lang::get('common.Mobile')]) }}
                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                        </div>
                    </div>
                    
                
                
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a class="btn btn-primary" href="{{ url('home')}}">Cancel</a>
                            </div>
                        </div>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

<style>
  .remove-btn {
    display: block;
    border: solid 1px #ccc;
    padding: 2px 0;
    border-radius: 2px;
    width: 74px;
    margin: 0px auto 17px;
    text-align: center;cursor:pointer;
  }
</style>
@endsection

@section('jscript')

<script type="text/javascript">
 $(document).ready(function() {
    
    jQuery('#validateProfileForm').validate({
 
       // initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
            mobile: {
                required: true
            }
        },
        messages:{

            name:{
              required: 'This field is required.'
            }
        },
    submitHandler: function (form) {
            form.submit();
        }

    });

});
   
</script>
@endsection
    