@extends('adminLayout', ['admin_access_active' => 'active', 'admin_permission_active' => 'active'])

@section('content')
<div class="page-content">

    <ol class="breadcrumb">
        <li><a href='{{ route('admin_dashboard') }}'>Home</a></li>
        <li><a href='#'>Access Management</a></li>
        <li class="active"><a href="{{ route('admin_permissions') }}">Permissions</a></li>
    </ol>

    <div class="container-fluid">      

        <div class="pull-right">
            <a href="{{ route('admin_add_permission') }}">
                <button id="add-state-id" class="btn btn-sm btn-success btn-raised btn-label" type="button">
                    <i class="material-icons">add</i> Add New<div class="ripple-container"></div>
                </button>
            </a>
        </div>

        @if(Session::has('message'))
        <div class="alert alert-dismissable alert-success m-success-msg-cls">
            <i class="fa fa-check"></i>&nbsp; {{ Session::get('message') }}
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        </div>
        @endif

        <!-- filter -->
        <section class="content1" style="margin: 56px 0 12px 0;">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">

                            <h3 class="box-title ms-box-title" style="margin: 5px 0 10px 0;">Filter
                                @if(isset($arrSearch) && count($arrSearch) > 0)
                                <span class="filter-head-span-cls">{{$total or ''}} record found. 
                                    <a href="{{route('admin_permissions')}}" style="color: #EE5E28;">View All</a>
                                </span>
                                @endif
                                <span class="filter-open-close filter-open">&#9660;</span>
                                <span class="filter-open-close filter-close" style="display: none;">&#9650;</span>
                            </h3>

                            {!!
                            Form::open(
                            array(
                            'name' => 'frm_filter_permission',
                            'id' => 'frm_filter_permission',
                            'url' => route('admin_filter_permission'),
                            'autocomplete' => 'off',
                            'class' => 'frm_filter_permission',
                            'method' => 'get'
                            )
                            )
                            !!}

                            <div class="main-filter-dv" style="<?php if (isset($arrSearch)) { ?>display: block;<?php } else { ?>display: none;<?php } ?>">

                                <div class="form-group filter-dv">
                                    <label>Permission Type</label>
                                    <input class="form-control" type="text" name="pemission_type" 
                                           value="{{$arrSearch['pemission_type'] or ''}}" placeholder="Enter Permission Type" />
                                </div>

                                <div class="form-group filter-dv">
                                    <label>Permission Name</label>
                                    <input class="form-control" type="text" name="pemission_name" 
                                           value="{{$arrSearch['pemission_name'] or ''}}" placeholder="Enter Permission Name" />
                                </div>

                                <div class="form-group filter-dv">
                                    <label>Display Name</label>
                                    <input class="form-control" type="text" name="display_name"
                                           value="{{$arrSearch['display_name'] or ''}}" placeholder="Enter Display Name" />
                                </div>

                                <div class="form-group filter-dv">
                                    <label for="">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select Status</option>
                                        <option <?php if (isset($arrSearch) && $arrSearch['status'] === "1") { ?>selected=""<?php } ?> value="1">Active</option>
                                        <option <?php if (isset($arrSearch) && $arrSearch['status'] === "0") { ?>selected=""<?php } ?> value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="<?php if (isset($arrSearch) && count($arrSearch) > 0) { ?>filter-dwnld-btns<?php } else { ?>filter-btns<?php } ?> pull-right">
                                    <input type="submit" class="btn btn-raised btn-sbmt-filter 
                                           <?php if (!isset($arrSearch)) { ?>single-btn-cls<?php } ?>" style="background: #3C8DBC;" 
                                           value="Apply Filter" name="apply_filter">
                                    @if(isset($arrSearch) && count($arrSearch) > 0)
                                    <input type="submit" class="btn btn-raised btn-sbmt-filter" style="background: #E79800;" value="Download" name="download">
                                    @endif
                                </div>

                            </div>
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- filter -->

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">

                    <div class="panel-heading">
                        <h2>Manage Permission</h2>
                        <span class="pull-right ms-total-count-span">{{$total or ''}}</span>
                    </div>

                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>         
                                    <th>Type</th>  
                                    <th>Name</th>  
                                    <th>Display Name</th> 
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1;
                                ?>
                                @if(isset($arrPermissionList) && count($arrPermissionList) > 0)
                                @foreach($arrPermissionList as $permission)

                                <?php
                                $status = "";
                                if ($permission->is_display == 0) {
                                    $status = "Inactive";
                                } else {
                                    $status = "Active";
                                }
                                ?>

                                <tr class="odd gradeX">
                                    <td>{{ $i }}</td>
                                    <td>{{ $permission->type }}</td>                                                                         
                                    <td>{{ $permission->name }}</td>                                
                                    <td>{{ $permission->display_name }}</td>                                                                            
                                    <td>{{ $status }}</td>       
                                    <td class="center"> 
                                        <a href="{{ route('admin_edit_permission', $permission->id) }}">
                                            <button class="btn btn-warning waves-effect waves-light btn-xs m-b-5 btnEdit"> 
                                                <i class="fa fa-pencil"></i> <span>Edit</span> 
                                            </button>
                                        </a>
                                        <a href="{{ route('admin_delete_permission', $permission->id) }}" class="delete-permission">
                                            <button class="btn btn-xs btn-danger btn-raised btn-label">
                                                <i class="fa fa-remove"></i> Delete<div class="ripple-container"></div>
                                            </button>
                                        </a>
                                    </td> 
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" align='center'>
                                        <span style="color: #f00;">@lang('messages.NO_RECORD_FOUND')</span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection


    @section('pageTitle')
    Manage Permissions
    @endsection

    @section('addtional_css')
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
    <style type="text/css">
        .filter-btns {
            margin: 0px 10px 0px 0;
        }
    </style>
    @endsection

    @section('jscript')
    <script type="text/javascript">
        $(".delete-permission").confirm({
            title: "Delete confirmation",
            text: "Are you sure, you want to delete this permission ?"
        });
    </script>
    @endsection