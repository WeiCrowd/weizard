@extends('admin.main')

@section('head_icon')
hvr-buzz-out fa fa-user-secret
@endsection

@section('heading')
Manage Admin Profile
@endsection

@section('sub_heading')
You can manage admin profile from here
@endsection

@section('content')
<div class="page-content">

    <div class="container-fluid">

        @if(Session::has('message'))
        <div class="alert alert-dismissable alert-success m-success-msg-cls">
            <i class="fa fa-check"></i>&nbsp; {{ Session::get('message') }}
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        </div>
        @endif

        <div class="row">

            <div class="col-md-12 pl-n pr-n">
                <ul class="nav nav-tabs material-nav-tabs mb-lg">
                    <li class="active"><a href="#tab-8-1" data-toggle="tab">About</a></li>
                    <li><a href="#tab-8-5" data-toggle="tab">Edit</a></li>
                    <li><a href="#tab-8-6" data-toggle="tab">Change Password</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <div class="panel panel-profile">
                    <div class="panel-heading" style="background: #444;">
                        <h2>About</h2>
                    </div>
                    <div class="panel-body">

                        @if(isset($arrAdmindata) && $arrAdmindata->user_photo != '')
                        <div style="float: left;
                             width: 100%;
                             text-align: center;">    
                            <img style="width: 150px;box-shadow: 2px 2px 5px 2px #ccc;" 
                                 src="{{ url('/') }}/admin_image/{{$arrAdmindata->user_photo}}" />
                        </div>
                        @endif

                        <div>
                            <div class="personel-info pt-n">
                                <span class="icon"><i class="material-icons">email</i></span>
                                <span>{{$arrAdmindata->email}}</span>
                            </div>

                            <div class="personel-info">
                                <span class="icon"><i class="material-icons">call</i></span>
                                <span>{{$arrAdmindata->mobile}}</span>
                            </div>
                        </div>
                    </div>
                </div><!-- panel -->
            </div><!-- col-sm-3 -->

            <div class="col-md-9">
                <div class="tab-content">
                    <div class="panel-profile">
                        <div class="tab-content">
                            <div class="tab-pane p-md active" id="tab-8-1">
                                <div class="about-area">
                                    <h4>Basic Information</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><a href="#">{{$arrAdmindata->email or ''}}</a></td>
                                                </tr>
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{$arrAdmindata->mobile or ''}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="about-area">
                                    <h4>Personal Information</h4>
                                    <div class="table-responsive">
                                        <table class="table about-table">
                                            <tbody>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td>{{$arrAdmindata->name or ''}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane p-md" id="tab-8-5" style="background: #fff;">
                                <div class="row">
                                    {!!
                                    Form::open(
                                    array(
                                    'name' => 'frmAddmerchant',
                                    'id' => 'validate-form',
                                    'url' => route('admin_save_profile'),
                                    'autocomplete' => 'off',
                                    'class' => 'form-horizontal edit-merchant-form',
                                    'files' => true
                                    )
                                    )
                                    !!}
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{$arrAdmindata['first_name'] or ''}}">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{$arrAdmindata['last_name'] or ''}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile_number" class="col-sm-2 control-label">Mobile Number</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="mobile_number" name="mobile_number" 
                                                       placeholder="Mobile Number" value="{{$arrAdmindata->mobile or ''}}">
                                            </div>
                                        </div>

                                        <div class="form-group is-empty is-fileinput" id="ad_image_block">
                                            <label class="col-sm-2 control-label">Profile Photo</label>
                                            <div class="col-sm-8 input-group">
                                                <input type="file" multiple="" id="image" name="image">
                                                <input type="text" placeholder="Upload Profile Photo" class="form-control" 
                                                       id="image" readonly="" name='image' value="">
                                                <span class="input-group-btn input-group-sm">
                                                    <button class="btn btn-fab btn-fab-mini" type="button">
                                                        <i class="material-icons">attach_file</i>
                                                    </button>
                                                </span>
                                            </div>
                                            @if(isset($arrAdmindata) && $arrAdmindata->user_photo != '')
                                            <img style="width: 150px;margin: 1% 0px 0px 25%;box-shadow: 2px 2px 5px 2px #ccc;" 
                                                 src="{{ url('/') }}/admin_image/{{$arrAdmindata->user_photo}}" />
                                            @endif
                                        </div>

                                        <div class="">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2" style="text-align: center;">
                                                    <input type="hidden" name="admin_id" value="{{Auth::user()->id}}" />
                                                    <button type="submit" class="btn-raised btn-success btn" name="submit" value="submit">Submit</button>
                                                    <a href="{{ route('admin_profile') }}">
                                                        <button type="button" class="btn-raised btn-danger btn">Cancel</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {!! Form::close()!!}
                                </div>
                            </div>

                            <div class="tab-pane p-md" id="tab-8-6">
                                <div class="row">
                                    {!!
                                    Form::open(
                                    array(
                                    'name' => 'frmAddmerchant',
                                    'id' => 'validate-change-password',
                                    'url' => route('admin_change_password'),
                                    'autocomplete' => 'off',
                                    'class' => 'form-horizontal edit-merchant-form',
                                    'files' => true
                                    )
                                    )
                                    !!} 
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Old Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="old_password" placeholder="Old Password" class="form-control" required="">
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">New Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password" placeholder="New Password" class="form-control" id="password123" required="" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : '');
                                                        if (this.checkValidity())
                                                            form.confirm_password.pattern = this.value;">
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile_number" class="col-sm-2 control-label">Confirm Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" id="confirm_password" required="" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter old password same as password' : '');">
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2" style="text-align: center;">
                                                    <input type="hidden" name="admin_id" value="{{Auth::user()->id}}" />
                                                    <button type="submit" class="btn-raised btn-success btn" name="submit" value="submit">Submit</button>
                                                    <a href="">
                                                        <button type="button" class="btn-raised btn-danger btn">Cancel</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {!! Form::close()!!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- .tab-content -->
            </div><!-- col-sm-8 -->
        </div>
    </div> <!-- .container-fluid -->
</div> <!-- #page-content -->
@endsection

@section('pageTitle')
My Profile
@endsection

@section('css')
<style type="text/css">
    .static-content-wrapper .nav-tabs li.active a{
        color: brown!important;
    }
</style>
<link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
@endsection

@section('jscript')

@endsection