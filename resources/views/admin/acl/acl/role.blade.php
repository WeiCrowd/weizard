@extends('admin.main')

@section('head_icon')
hvr-buzz-out fa fa-user-secret
@endsection

@section('heading')
ACL (Access Control List)
@endsection

@section('sub_heading')
You can manage acl from here
@endsection



@section('content')
<div class="page-content">
    <div class="container-fluid">      

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">

                    <div class="panel-heading panel-title">
                        <h4>Manage ACL</h4>
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
                                        <a href="{{route('admin_edit_role_permission', $role->id)}}">
                                            <button class="btn btn-warning btn-sm btn-circle m-b-5" data-toggle="tooltip" data-placement="left" title="Manage Permissions">
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



@section('jscript')
<script type="text/javascript">
    $(".delete-role").confirm({
        title: "Delete confirmation",
        text: "Are you sure, you want to delete this role"
    });
</script>
<script src="{{ asset('assets/js/admin/accessmanagement/role.js') }}"></script>
@endsection