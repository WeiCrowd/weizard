@extends('adminLayout', ['admin_access_active' => 'active', 'admin_permission_active' => 'active'])

@section('content')
<div class="page-content">

    <ol class="breadcrumb">
        <li><a href='{{ route('admin_dashboard') }}'>Home</a></li>
        <li><a href="#">Access Management</a></li>
        <li><a href="{{ route('admin_permission') }}">Permission</a></li>
        @if(isset($id))
        <li class="active"><a href="{{ route('admin_edit_permission', $id) }}">Edit Permission</a></li>
        @else
        <li class="active"><a href="{{ route('admin_add_permission') }}">Add Permission</a></li>
        @endif
    </ol>

    <div class="page-heading">
        @if(isset($id))
        <h1>Edit Permission</h1>
        @else
        <h1>Add Permission</h1>
        @endif
    </div>

    <div class="container-fluid">

        @if(Session::has('error_message'))
        <div class="alert alert-dismissable alert-danger" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);padding: 10px 5px;height: 35px;margin-top: 10px;width: 100%;">
            <i class="fa fa-check"></i>&nbsp; {{ Session::get('error_message') }}
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        </div>
        @endif

        <div class="row">
            <div class="col-sm-12">

                @if(Session::has('err_emp_permission'))
                <!-- err_emp_permission -->
                <ul>
                    @foreach(session('err_emp_permission')[0]['error_msg'] as $k=>$err)
                    <li style="color: #f00;">{{ $err[0] }}</li>
                    @endforeach
                </ul>
                <!-- err_emp_permission -->
                @endif

                {!!
                Form::open(
                array(
                'name' => 'frm_add_admin_permission',
                'id' => 'frm_add_admin_permission',
                'url' => route('admin_save_permission'),
                'autocomplete' => 'off',
                'class' => 'form-horizontal frm_add_admin_permission'
                )
                )
                !!}

                <div class="panel panel-primary" data-widget='{"draggable": "false"}'>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Type<span class="error_message_label">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control"
                                               name="type" 
                                               placeholder="Enter Type" 
                                               value="{{$arrEditData->type or session('all_data')['type']}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Name<span class="error_message_label">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control"
                                               name="name" 
                                               placeholder="Enter Name" 
                                               value="{{$arrEditData->name or session('all_data')['name']}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Display Name<span class="error_message_label">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control"
                                               name="display_name" placeholder="Enter Location" 
                                               value="{{$arrEditData->display_name or session('all_data')['display_name']}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Description</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <textarea class="form-control"
                                                  name="description" 
                                                  placeholder="Enter Description">{{$arrEditData->description or session('all_data')['description']}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label">Is Display<span class="error_message_label">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class="icon select_down_button"><i class="fa fa-sort-down"></i></span>
                                        <select name="is_display" class="form-control">
                                            <option value="1" <?php if (isset($arrEditData) && $arrEditData->is_display == 1) { ?>selected=""<?php } ?>>Yes</option>
                                            <option value="0" <?php if (isset($arrEditData) && $arrEditData->is_display == 0) { ?>selected=""<?php } ?>>No</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-7 col-sm-offset-3" style="text-align: center;">
                                <input type="hidden" name="permission_id" value="{{$id or ''}}" />
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
Edit Permission
@else
Add Permission
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