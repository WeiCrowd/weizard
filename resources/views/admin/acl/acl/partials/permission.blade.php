<li><label>
        
        @if(in_array($permission['id'], $rolePermissions)) 
            @php $checked = "checked"; @endphp
        @else
            @php $checked = ""; @endphp
        @endif
        @if($permission['parent_permission_id']==0)
        <input type="checkbox" name="permissions_parent[]" id="permission_id" value="{{ $permission['id'] }}" {{$checked}} >{{ $permission['display_name'] }}
        @else
        <input type="checkbox" name="permissions[]" id="permission_id" value="{{ $permission['id'] }}" {{$checked}} >{{ $permission['display_name'] }}
        @endif
    </label>
        
@if (count($permission['children']) > 0)
<ul>
    @foreach($permission['children'] as $permission)
       @include('admin.acl.acl.partials.permission', $permission)
    @endforeach
</ul>
@endif
</li>
