@extends('admin.main')

@section('head_icon')
hvr-buzz-out fa fa-user-secret
@endsection

@section('heading')
@if(isset($id))
Edit Role
@else
Add Role
@endif
@endsection

@section('sub_heading')
@if(isset($id))
You can edit role from here
@else
You can add role from here
@endif
@endsection




@section('content')

<div class="page-content">

    <div class="container-fluid">

        @if(Session::has('error_message'))
        <div class="alert alert-dismissable alert-danger" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);padding: 10px 5px;height: 35px;margin-top: 10px;width: 100%;">
            <i class="fa fa-check"></i>&nbsp; {{ Session::get('error_message') }}
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        </div>
        @endif

        <div class="row">
            <div class="col-sm-12">

                @if(Session::has('err_role'))
                <!-- err_role -->
                <ul>
                    @foreach(session('err_role')[0]['error_msg'] as $k=>$err)
                    <li style="color: #f00;">{{ $err[0] }}</li>
                    @endforeach
                </ul>
                <!-- err_role -->
                @endif

                {!!
                Form::open(
                array(
                'name' => 'frm_add_role',
                'id' => 'frm_add_role',
                'url' => route('admin_save_role'),
                'autocomplete' => 'off',
                'class' => 'form-horizontal frm_add_role',
                'files' => true
                )
                )
                !!}

                <div class="panel panel-primary" data-widget='{"draggable": "false"}'>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">

                                @if(Session::has('emp_success'))
                                <!-- success message -->
                                <ul class="success_ul">
                                    <li>{{ Session::get('emp_success') }}</li>
                                </ul>
                                <!-- success message -->
                                @endif

                                <!-- merror -->
                                @if(Session::has('emp_error'))
                                <ul class="error_ul">
                                    <li style="color: #f00;">{{ Session::get('emp_error') }}</li>
                                </ul>
                                @endif
                                <!-- merror -->

                                <!-- catch error -->
                                @if(Session::has('erremp_response_catch'))
                                <ul class="error_ul">
                                    @foreach(session('erremp_response_catch')[0]['error_msg'] as $k=>$err)
                                    <li>{{ $err }}</li>
                                    @endforeach
                                </ul>    
                                @endif
                                <!-- catch error -->

                                <!-- reg error -->
                                @if(Session::has('erremp_response'))
                                <ul class="error_ul">
                                    @foreach(session('erremp_response')[0]['error_msg'] as $k=>$err)
                                    <li>{{ $err[0] }}</li>
                                    @endforeach
                                </ul>    
                                @endif
                                <!-- reg error -->
                              
                                
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Name<span class="error_message_label">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control" 
                                               id="name" 
                                               name="name" 
                                               placeholder="Enter Name" 
                                               value="{{$arrEditData->name or session('all_data')[0]['name']}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Display Name<span class="error_message_label">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control" id="display_name" 
                                               name="display_name" placeholder="Enter Display Name"
                                               value="{{$arrEditData->display_name or session('all_data')[0]['display_name']}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="description" 
                                                  name="description" style="min-height: 150px;"
                                                  placeholder="Enter Description">{{$arrEditData->description or session('all_data')[0]['description']}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Status<span class="error_message_label">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" <?php if (isset($arrEditData) && $arrEditData->is_active == 1) { ?>selected=""<?php } ?>>Active</option>
                                            <option value="0" <?php if (isset($arrEditData) && $arrEditData->is_active == 0) { ?>selected=""<?php } ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-7 col-sm-offset-3" style="text-align: center;margin-top: 15px;">
                                <input type="hidden" name="role_id" value="{{$id or ''}}" />
                                @if(isset($id))
                                <button type="submit" class="btn-raised btn-success btn" name="update" value="submit">Update</button>
                                @else  
                                <button type="submit" class="btn-raised btn-success btn" name="submit" value="submit">Submit</button>
                                @endif
                                <a href="{{ URL::previous() }}">
                                    <button type="button" class="btn-raised btn-danger btn">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div> <!-- .container-fluid -->
</div> <!-- #page-content -->
@stop

@section('pageTitle')
@if(isset($id))
Edit Role
@else
Add Role
@endif
@stop

@section('addtional_css')
<style>
    .heading-cls{
        font-size: 15px;
        font-weight: bold;
        margin: 16px 0 -13px 14px!important;
        text-align: left;
    }
    .error_ul li{
        color: #f00;
        font-size: 14px;
        padding: 0 0 5px;
    }
    .success_ul{
        background: #689f38 none repeat scroll 0 0;
        border-radius: 5px;
        color: #fff;
        margin: 10px 0;
        padding: 11px 5px;
        text-align: center;
    }
</style>
@endsection

@section('jscript')
@endsection