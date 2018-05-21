<li><label>
        @if(in_array($permission['id'], $rolePermissions)) 
            @var $checked = "checked";
        @else
            @var $checked = "";
        @endif
        <input type="checkbox" name="permissionschild[]" id="permission_id" value="{{ $permission['id'] }}" {{$checked}} >{{ $permission['display_name'] }}</label>
</li>