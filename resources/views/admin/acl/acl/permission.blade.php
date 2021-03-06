@extends('admin.main', ['admin_access_active' => 'active', 'admin_role_active' => 'active'])

@section('content')
<section class="content-header">
    <div class="header-icon">
        <i class="pe-7s-note2"></i>
    </div>
    <div class="header-title">
        <h1>ACL</h1>
        <small>Manage ACL</small>
        <ol class="breadcrumb">
            <li><a href='{{ route('admin_dashboard') }}'><i class="pe-7s-home"></i> Home</a></li>
            <li><a href='#'>Access Management</a></li>
    
        </ol>
    </div>
</section>

<div class="page-content">

    <div class="container-fluid">      

        <div class="pull-right" style="margin: -8px 0 2px 0;">
            <a href="{{route('admin_add_role')}}">
                <button class="btn btn-labeled btn-success m-b-5" type="button">
                    <span class="btn-label">
                        <i class="glyphicon glyphicon-plus"></i>
                    </span>
                    Add New
                </button>
            </a>
        </div>

        @if(Session::has('message'))
        <div class="alert alert-dismissable alert-success m-success-msg-cls" style="width: 44%;">
            <i class="fa fa-check"></i>&nbsp; {{ Session::get('message') }}
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">

                    <div class="panel-heading">
                        <h2>Manage Role</h2>
                        <span class="pull-right ms-total-count-span">{{$total or ''}}</span>
                    </div>

                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>         
                                    <th>Name</th>  
                                    <th>Display Name</th> 
                                    <th>Date</th>
                                    <th style="width: 140px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = 1; ?>

                                @if(isset($arrRoleList) && count($arrRoleList) > 0)
                                @foreach($arrRoleList as $role)                                    
                                <tr class="odd gradeX">
                                    <td>{{ $i }}</td>
                                    <td>{{ $role->name }}</td>                                                                            
                                    <td>{{ $role->display_name }}</td>                                                                            
                                    <td>{{ date('d M Y',strtotime($role->created_at))}}</td>       
                                    <td class="actions center">
                                        <a href="{{route('edit_permission', $role->id)}}">
                                            <button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Manage Permissions">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
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

                </div>
            </div>
        </div>
    </div> <!-- .container-fluid -->
</div> <!-- #page-content -->
@endsection

@section('pageTitle')
Manage Roles
@endsection

@section('addtional_css')
<link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
@endsection

@section('jscript')
<script type="text/javascript">
    $(".delete-role").confirm({
        title: "Delete confirmation",
        text: "Are you sure, you want to delete this role"
    });
</script>
<script src="{{ asset('assets/js/admin/accessmanagement/role.js') }}"></script>
@endsection