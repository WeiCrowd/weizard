
<div class="panel panel-success">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>{{ Lang::get('common.AddEdit') }} {{ Lang::get('admin/AccessManagement/user.User') }}</h4>
        </div>

    </div>

    <div class="panel-body">

        {{ Form::model($edit_user, array('route' => array('user.update', $edit_user->id), 'method' => 'PUT', 'id'=>'validateForm')) }}
        {{ Form::hidden('created_by','1') }}
        {{ Form::hidden('id', $edit_user->id) }}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{ Form::label('name', Lang::get('common.Name'), ['class' => 'control-label']) }}
            <span class="mandetory">*</span>
            {{ Form::text('name', isset($edit_user->name)?$edit_user->name:'', ['class' => 'form-control','placeholder'=>'Name']) }}
            <span class="text-danger">{{ $errors->first('name') }}</span>                                               
        </div>

        


        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {{ Form::label('email', Lang::get('common.Email'), ['class' => 'control-label']) }}
            <span class="mandetory">*</span>
            {{ Form::text('email', isset($edit_user->email)?$edit_user->email:'', ['class' => 'form-control','placeholder'=>'Email']) }}
            <span class="text-danger">{{ $errors->first('email') }}</span>                                               
        </div>
        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
            {{ Form::label('mobile', Lang::get('common.Mobile'), ['class' => 'control-label']) }}
            <span class="mandetory">*</span>
            {{ Form::text('mobile', isset($edit_user->mobile)?$edit_user->mobile:'', ['class' => 'form-control','placeholder'=>'Mobile' ,'maxlength'=>'10']) }}
            <span class="text-danger">{{ $errors->first('mobile') }}</span>                                               
        </div>

        <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
            {{ Form::label('role', 'Role', ['class' => 'control-label']) }}
            <span class="mandetory">*</span>
            {{ Form::select('role',  (['' => 'Select Role']+$role), isset($user_role[0]->role_id)?$user_role[0]->role_id:'', ['class' => 'form-control'])}}
            <span class="text-danger">{{ $errors->first('role') }}</span>
        </div>
        
<!--        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            {{ Form::label('status', Lang::get('common.Status'), ['class' => 'control-label']) }}
            <span class="mandetory">*</span>
            {{ Form::select('status', [''=>'Select Status','A'=>'Active', 'D'=>'Inactive'], isset($user_status[0]->register_status)?$user_status[0]->register_status:'', ['class' => 'form-control']) }}
            <span class="text-danger">{{ $errors->first('status') }}</span>
        </div>-->
        
        
        <div class="form-group">
            {{ Form::submit('Submit',['class'=>'btn btn-primary']) }}
        </div>
        {{ Form::close() }}
    </div>
    <div class="panel-footer">
        {{ Lang::get('common.manFields') }}
    </div>
</div>
