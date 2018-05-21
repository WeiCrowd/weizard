@extends('adminLayout', ['admin_access_active' => 'active', 'admin_role_active' => 'active'])

@section('content')
<div class="page-content">

    <ol class="breadcrumb">
        <li><a href='{{ route('admin_dashboard') }}'>Home</a></li>
        <li><a href='#'>Access Management</a></li>
        <li class="active"><a href="{{ route('admin_role_permission', $roleID) }}">Assign Permissions</a></li>
    </ol>

    <div class="page-heading">
        <h1>ASSIGN PERMISSIONS</h1>
    </div>

    <div class="select-all-div" style="position: absolute;right: 3%;top: 46px;">
        <input type="checkbox" class="check-all" id="checkAll" /> &nbsp; Select All
    </div>

    <div class="container-fluid">      

        @if(Session::has('message'))
        <div class="alert alert-dismissable alert-success" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);padding: 10px 5px;height: 35px;margin-top: 10px;width: 100%;">
            <i class="fa fa-check"></i>&nbsp; {{ Session::get('message') }}
            <button style="right: 7px;" aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        </div>
        @endif

        <!-- Accordion -->
        <div class="row">
            <div class="col-md-12">

                {!!
                Form::open(
                array(
                'name' => 'frmAddrolepermission',
                'id' => 'addrolepermission_form',
                'url' => route('admin_save_rolepermission'),
                'autocomplete' => 'off',
                'class' => 'form-horizontal row-border',
                'files' => true
                )
                )
                !!}

                <div class="panel-group panel-default" id="accordionA">

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse1"><div class="panel-heading"><h2>Dashboard</h2></div></a>
                        <div id="collapse1" class="collapse in">
                            <div class="panel-body">
                                <span class="permission_check"><input type="checkbox" value="view_dashboard" name="permission[]" <?php if (in_array('view_dashboard', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View DashBoard</span></span>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse2"><div class="panel-heading"><h2>JobSeeker</h2></div></a>
                        <div id="collapse2" class="collapse in">
                            <div class="panel-body">
                                <span class="permission_check">
                                    <input type="checkbox" value="view_jobseeker" name="permission[]" <?php if (in_array('view_jobseeker', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Jobseeker</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_jobseeker" name="permission[]" <?php if (in_array('delete_jobseeker', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete Jobseeker</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="profile_percentage" name="permission[]" <?php if (in_array('profile_percentage', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Profile Percentage</span>
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="jobseeker_count" name="permission[]" <?php if (in_array('jobseeker_count', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Jobseeker Count</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse3">
                            <div class="panel-heading">
                                <h2>Manage Employer</h2>
                            </div>
                        </a>
                        <div id="collapse3" class="collapse in">
                            <div class="panel-body">

                                <span class="permission_check">
                                    <input type="checkbox" value="view_employer" name="permission[]" <?php if (in_array('view_employer', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Employer</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="add_employer" name="permission[]" <?php if (in_array('add_employer', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add Employer</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="edit_employer" name="permission[]" <?php if (in_array('edit_employer', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit Employer</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="delete_employer" name="permission[]" <?php if (in_array('delete_employer', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete Employer</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="reactive_employer" name="permission[]" <?php if (in_array('reactive_employer', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">ReActive Employer</span>    
                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse4">
                            <div class="panel-heading">
                                <h2>Manage Employer Package</h2></div>
                        </a>
                        <div id="collapse4" class="collapse in">
                            <div class="panel-body">

                                <span class="permission_check">
                                    <input type="checkbox" value="view_emp_package" name="permission[]" <?php if (in_array('view_emp_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Employer Package</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="add_emp_package" name="permission[]" <?php if (in_array('add_emp_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add Employer Package</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="edit_emp_package" name="permission[]" <?php if (in_array('edit_emp_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit Employer Package</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="delete_emp_package" name="permission[]" <?php if (in_array('delete_emp_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete Employer Package</span>    
                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse5"><div class="panel-heading"><h2>Manage Job</h2></div></a>
                        <div id="collapse5" class="collapse in">
                            <div class="panel-body">

                                <span class="permission_check">
                                    <input type="checkbox" value="view_employer" name="permission[]" <?php if (in_array('view_employer', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Employer</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="view_emp_package" name="permission[]" <?php if (in_array('view_emp_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Employer Package</span>    
                                </span>

                                <span class="permission_check">
                                    <input type="checkbox" value="view_emp_access" name="permission[]" <?php if (in_array('view_emp_access', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Access Management</span>    
                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse6">
                            <div class="panel-heading">
                                <h2>Masters</h2>
                            </div>
                        </a>
                        <div id="collapse6" class="collapse in">
                            <div class="panel-body">

                                <!-- master categories -->
                                <h3 class="manage-inner-cls">Manage Categories Permission</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_master_categories" name="permission[]" <?php if (in_array('view_master_categories', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Categories</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="add_master_categories" name="permission[]" <?php if (in_array('add_master_categories', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add Categories</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="edit_master_categories" name="permission[]" <?php if (in_array('edit_master_categories', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit Categories</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_master_categories" name="permission[]" <?php if (in_array('delete_master_categories', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete Categories</span>    
                                </span>
                                <!-- master categories -->

                                <!-- master country -->
                                <h3 class="manage-inner-cls">Manage Country Permission</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_master_state" name="permission[]" <?php if (in_array('view_master_state', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View State</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="add_master_state" name="permission[]" <?php if (in_array('add_master_state', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add State</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="edit_master_state" name="permission[]" <?php if (in_array('edit_master_state', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit State</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_master_state" name="permission[]" <?php if (in_array('delete_master_state', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete State</span>    
                                </span>
                                <!-- master state -->

                                <!-- master state -->
                                <h3 class="manage-inner-cls">Manage State Permission</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_master_state" name="permission[]" <?php if (in_array('view_master_state', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View State</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="add_master_state" name="permission[]" <?php if (in_array('add_master_state', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add State</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="edit_master_state" name="permission[]" <?php if (in_array('edit_master_state', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit State</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_master_state" name="permission[]" <?php if (in_array('delete_master_state', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete State</span>    
                                </span>
                                <!-- master state -->

                                <!-- master city -->
                                <h3 class="manage-inner-cls">Manage City Permission</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_master_city" name="permission[]" <?php if (in_array('view_master_city', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View City</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="add_master_city" name="permission[]" <?php if (in_array('add_master_city', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add City</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="edit_master_city" name="permission[]" <?php if (in_array('edit_master_city', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit City</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_master_city" name="permission[]" <?php if (in_array('delete_master_city', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete City</span>    
                                </span>
                                <!-- master city -->

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse7"><div class="panel-heading"><h2>Advertisement</h2></div></a>
                        <div id="collapse7" class="collapse in">
                            <div class="panel-body">
                                <span class="permission_check">
                                    <input type="checkbox" value="view_sms_package" name="permission[]" <?php if (in_array('view_sms_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View SMS Package</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="add_sms_package" name="permission[]" <?php if (in_array('add_sms_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add SMS Package</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="edit_sms_package" name="permission[]" <?php if (in_array('edit_sms_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit SMS Package</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_sms_package" name="permission[]" <?php if (in_array('delete_sms_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete SMS Package</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="deleteall_sms_package" name="permission[]" <?php if (in_array('deleteall_sms_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete All SMS Package</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="viewbal_sms_package" name="permission[]" <?php if (in_array('viewbal_sms_package', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View SMS Balance</span>    
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse8">
                            <div class="panel-heading"><h2>Banner</h2></div>
                        </a>
                        <div id="collapse8" class="collapse in">
                            <div class="panel-body">
                                <!-- master advertisement -->
                                <h3 class="manage-inner-cls">Manage Advertisement</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_advertisement" name="permission[]" <?php if (in_array('view_advertisement', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Advertisement</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="add_advertisement" name="permission[]" <?php if (in_array('add_advertisement', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add Advertisement</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="edit_advertisement" name="permission[]" <?php if (in_array('edit_advertisement', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit Advertisement</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="preview_advertisement" name="permission[]" <?php if (in_array('preview_advertisement', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Preview Advertisement</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_advertisement" name="permission[]" <?php if (in_array('delete_advertisement', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete Advertisement</span>    
                                </span>
                                <!-- master advertisement -->

                                <!-- advertisement graph -->
                                <h3 class="manage-inner-cls">Manage Advertisement Graph</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_ads_graph" name="permission[]" <?php if (in_array('view_ads_graph', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Advertisement Graph</span>    
                                </span>
                                <!-- advertisement graph -->
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse9">
                            <div class="panel-heading"><h2>Contact Sale</h2></div>
                        </a>
                        <div id="collapse9" class="collapse in">
                            <div class="panel-body">
                                <!-- Merchant Registration Payment -->
                                <h3 class="manage-inner-cls">Merchant Registration Payment</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_merchant_reg_payment" name="permission[]" <?php if (in_array('view_merchant_reg_payment', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Merchant Registration Payment</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="download_merchant_reg_payment" name="permission[]" <?php if (in_array('download_merchant_reg_payment', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Download Merchant Registration Payment</span>    
                                </span>
                                <!-- Merchant Registration Payment -->

                                <!-- Recharge -->
                                <h3 class="manage-inner-cls">Recharge</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_recharge_payment" name="permission[]" <?php if (in_array('view_recharge_payment', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Recharge Payment</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="detail_recharge_payment" name="permission[]" <?php if (in_array('detail_recharge_payment', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Detail Recharge Payment</span>    
                                </span>
                                <!-- Recharge -->

                                <!-- SMS Package Payment -->
                                <h3 class="manage-inner-cls">SMS Package Payment</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_sms_package_payment" name="permission[]" <?php if (in_array('view_sms_package_payment', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View SMS Package Payment</span>    
                                </span>
                                <!-- SMS Package Payment -->
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <a data-toggle="collapse" data-parent="#accordionA" href="#collapse10">
                            <div class="panel-heading"><h2>CMS Pages And Page Location</h2></div>
                        </a>
                        <div id="collapse10" class="collapse in">
                            <div class="panel-body">
                                <!-- Tollfree Log -->
                                <h3 class="manage-inner-cls">Tollfree Log</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_tollfree_log" name="permission[]" <?php if (in_array('view_tollfree_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Toll Free Log</span>    
                                </span>
                                <!-- Tollfree Log -->

                                <!-- contact Log -->
                                <h3 class="manage-inner-cls">Contact Log</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_contact_log" name="permission[]" <?php if (in_array('view_contact_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Contact Log</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="download_contact_log" name="permission[]" <?php if (in_array('download_contact_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Download Contact Log</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_contact_log" name="permission[]" <?php if (in_array('delete_contact_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete Contact Log</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="deleteall_contact_log" name="permission[]" <?php if (in_array('deleteall_contact_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete All Contact Log</span>    
                                </span>
                                <!-- contact Log -->

                                <!-- newsletter Log -->
                                <h3 class="manage-inner-cls">Newsletter Log</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_newsletter_log" name="permission[]" <?php if (in_array('view_newsletter_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View NewsLetter Log</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="download_newsletter_log" name="permission[]" <?php if (in_array('download_newsletter_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Download NewsLetter Log</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_newsletter_log" name="permission[]" <?php if (in_array('delete_newsletter_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete NewsLetter Log</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="deleteall_newsletter_log" name="permission[]" <?php if (in_array('deleteall_newsletter_log', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete All NewsLetter Log</span>    
                                </span>
                                <!-- newsletter Log -->

                                <!-- most search keyword -->
                                <h3 class="manage-inner-cls">Most Search Keyword</h3>
                                <span class="permission_check">
                                    <input type="checkbox" value="view_mostsearch_keyword" name="permission[]" <?php if (in_array('view_mostsearch_keyword', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">View Most Search Keyword</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="add_mostsearch_keyword" name="permission[]" <?php if (in_array('add_mostsearch_keyword', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Add Most Search Keyword</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="edit_mostsearch_keyword" name="permission[]" <?php if (in_array('edit_mostsearch_keyword', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Edit Most Search Keyword</span>    
                                </span>
                                <span class="permission_check">
                                    <input type="checkbox" value="delete_mostsearch_keyword" name="permission[]" <?php if (in_array('delete_mostsearch_keyword', $arrPermission)) { ?>checked=""<?php } ?> />&nbsp;<span class="permission_label">Delete Most Search Keyword</span>    
                                </span>
                                <!-- most search keyword -->
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer" style="text-align: center;">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <input type="hidden" value="{{$roleID}}" name="roleID" />
                                <input type="submit" value="Save" class="btn btn-warning" />
                                <button class="btn-danger btn" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>

                    {!! Form::close()!!}
                </div>
            </div>
            <!-- /Accordion -->
        </div> <!-- .container-fluid -->
    </div> <!-- #page-content -->
    @endsection


    @section('pageTitle')
    Assign Permissions
    @endsection

    @section('addtional_css')
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
    <style type="text/css">
        .permission_check{
            float: left;
            margin: 5px 15px 5px 0px;
        }
        .permission_label{
            margin: 2px 0px 0px 5px;
            float: right;
        }
        .panel-heading{
            background: #82CDC9!important;
        }
        input[type="checkbox"]{
            width: 20px!important;
            height: 20px!important;
        }
        input[type="radio"]{
            width: 20px!important;
            height: 20px!important;
        }
        .manage-inner-cls{
            font-size: 12px;
            margin: 5px 0 5px 0;
            background: #82CDC9;
            padding: 5px 15px;
            width: 100%;
            color: #fff;
            border-radius: 10px;
            float: left;
        }
    </style>
    @endsection

    @section('jscript')
    <script src="{{ asset('assets/js/admin/accessmanagement/role-permission.js') }}"></script>
    @endsection