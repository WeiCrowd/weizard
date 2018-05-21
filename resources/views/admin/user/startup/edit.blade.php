@extends('admin.main')

@section('head_icon')
  hvr-buzz-out fa fa-user-secret
@endsection

@section('heading')
  {{ Lang::get('common.Edit') }} {{ Lang::get('admin/user/startup.Heading') }}
@endsection

@section('sub_heading')
  {{ Lang::get('admin/user/startup.Sub_Heading') }}
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- Green Panel -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>{{ Lang::get('common.Edit') }} {{ Lang::get('admin/user/startup.Heading') }}</h4>
                </div>
                <span class="help-span pull-right"><a data-toggle="modal" data-target="#modal-lg">
                    </a></span>
            </div>
            <div class="panel-body">
                {{ Form::open(['method' => 'PUT','class'=>'form-horizontal','id'=>'validateStartupForm','autocomplete'=>'off', 'url'=> 'admin/startup/'. @$edit_startup->id, 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('id', @$edit_startup->id, ['id'=>'edit_id']) }}
                {{ csrf_field() }}
                     
            <div class="row">
                <div class="form-group col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                    {{ Form::label('name', Lang::get('admin/user/startup.name'), ['class' => 'control-label']) }}
                    <span class="mandetory">*</span>
                    {{ Form::text('name',@$edit_startup->name, ['class' => 'form-control','placeholder'=>Lang::get('admin/user/startup.name')]) }}
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                    {{ Form::label('email', Lang::get('admin/user/startup.email'), ['class' => 'control-label']) }}
                    <span class="mandetory">*</span>
                    {{ Form::text('email',@$edit_startup->email, ['class' => 'form-control','readonly'=>'true','placeholder'=>Lang::get('admin/user/startup.email')]) }}
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
            </div>
                
            <div class="row">
                <div class="form-group col-md-6 {{ $errors->has('mobile') ? 'has-error' : '' }}">
                    {{ Form::label('mobile', Lang::get('admin/user/startup.mobile'), ['class' => 'control-label']) }}
                    <span class="mandetory">*</span>
                    {{ Form::text('mobile',@$edit_startup->mobile, ['class' => 'form-control','readonly'=>'true','placeholder'=>Lang::get('admin/user/startup.mobile')]) }}
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                </div>
            </div>
             
                
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                    <a class="btn btn-primary" href="{{ url('admin/startup')}}">Cancel</a>
                </div>
            </div>
            {{ Form::close() }}
            
            </div>
           
        </div>
    </div>
    
</div>

                            
@endsection

@section('jscript')

<script type="text/javascript">
 $(document).ready(function() {
     
    jQuery('#validateStartupForm').validate({

       // initialize the plugin
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            name: {
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