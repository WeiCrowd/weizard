@extends('adminLayout', ['admin_access_active' => 'active', 'admin_role_active' => 'active'])
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="editpermission">
            {!!
            Form::
            open(
            array(
            'name'=>'B2cAddPermissionForms',
            'id'=>'B2cAddPermissionForms', 
            'class' => 'form-signin',
            'url' => route('edit-acl', $role->id)
            )
            )
            !!}
            {!! Form::hidden('role_id', $role_id, ['id'=>'role_id','readonly'=>'readonly']) !!}
            <h2>Add ACL</h2>
            <div class="rw">
                <lable><strong>Role Name </strong> : </lable>{{$role->display_name}}
                <p></p>

            </div>
            @if (count($permissions) > 0)

            <ul id="tree">

                @foreach ($permissions as $permission)
                @include('admin.accessmanagement.acl.partials.permission', $permission)
                @endforeach
            </ul>
            @else
            @include('admin.accessmanagement.acl.partials.permissions-none')
            @endif

            <div style="clear:both"></div>      
            <!--<div class="rw" id="permBox"></div>-->
            <div class="row">
                <div class="pull-right">
                    <button id="saveAffiliateLead" class="btn btn-success" title="Submit" type="submit">Submit</button>
                </div>
            </div>

            {!! Form::close() !!} 
        </div>
    </div>
</div>
@endsection
<style>
    #B2cAddPermissionForms ul li {
        float: left;
        width: 32.33%;
        margin: 0 1% 3px 0;
        list-style-type: none;
    }

    #B2cAddPermissionForms label {
        font-weight: normal;
        font-size: 12px;
    }
    #B2cAddPermissionForms ul li input[type="checkbox"] {
        margin-right: 8px;
    }
    #B2cAddPermissionForms ul li input[type="checkbox"] {
        margin-right: 8px;
    }

    #B2cAddPermissionForms ul li ul li {
        display: block;
        width: 100%;
    }

</style>

@section('pageTitle')
Manage Permission
@endsection


@section('jscript')
<script src="{{ asset('js/jquery-checktree.js') }}"></script>
<script>
    var messages = {
        req_role_type: "{{ trans('backend_error_message.req_role_type') }}",
        get_ajax_permission_list: "{{ URL::route('get_ajax_permission_list') }}",
        get_role_by_id: "{{ URL::route('get_role_by_id') }}",
        delete_permission: "{{ URL::route('delete_permission') }}",
        get_ajax_permission: "{{ URL::route('get_ajax_permission') }}",
        get_ajax_permission_view: "{{ URL::route('get_ajax_permission_view') }}",
        permission_assign_to: "{{ trans('backend_headings.permission_assign_to') }}",
        choose_permission: "{{ trans('backend_headings.choose_permission') }}",
        add_permission: "{{ trans('backend_headings.add_permission') }}",
        edit_permission: "{{ trans('backend_headings.edit_permission') }}",
        biz_admin: "{{ config('b2c_common.BIZ_ADMIN') }}",
    };
</script>

@endsection
