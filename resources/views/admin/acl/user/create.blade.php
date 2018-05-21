 <!-- Success Panel -->
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>{{ Lang::get('common.AddEdit') }} {{ Lang::get('admin/AccessManagement/user.User') }}</h4>
            </div>
        </div>
        <div class="panel-body">
              {{ Form::open(['method' => 'POST','id'=>'validateForm']) }}                                                
              {{ Form::hidden('created_by','1') }}
		    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        {{ Form::label('name', Lang::get('common.Name'), ['class' => 'control-label']) }}
                        <span class="mandetory">*</span>
                        {{ Form::text('name', '', ['class' => 'form-control','placeholder'=>'Name']) }}
                        <span class="text-danger">{{ $errors->first('name') }}</span>                                               
                    </div>
              
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        {{ Form::label('email', Lang::get('common.Email'), ['class' => 'control-label']) }}
                        <span class="mandetory">*</span>
                        {{ Form::text('email', '', ['class' => 'form-control','placeholder'=>'Email']) }}
                        <span class="text-danger">{{ $errors->first('email') }}</span>                                               
                    </div>
              
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        {{ Form::label('password', Lang::get('common.Password'), ['class' => 'control-label']) }}
                        <span class="mandetory">*</span>
                        {{ Form::password('password', ['class' => 'form-control','placeholder'=>Lang::get('common.Password') , 'id' => 'password']) }}
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                        {{ Form::label('confirm_password', Lang::get('common.Confirm_Password'), ['class' => 'control-label']) }}
                        <span class="mandetory">*</span>
                        {{ Form::password('confirm_password', ['class' => 'form-control','placeholder'=>Lang::get('common.Confirm_Password')]) }}
                        <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                    </div>
              
                    <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                        {{ Form::label('mobile', Lang::get('common.Mobile'), ['class' => 'control-label']) }}
                        <span class="mandetory">*</span>
                        {{ Form::text('mobile', '', ['class' => 'form-control','placeholder'=>'Mobile','id'=>'mobile','maxlength'=>'10','minlength'=>'10']) }}
                        <span class="text-danger">{{ $errors->first('mobile') }}</span>                                               
                    </div>

                    <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                        {{ Form::label('role', 'Role', ['class' => 'control-label']) }}
                        <span class="mandetory">*</span>
                        {{ Form::select('role',  (['' => 'Select Role']+$role), '', ['class' => 'form-control'])}}
                        <span class="text-danger">{{ $errors->first('role') }}</span>
                    </div>

              
<!--                    <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">                                              
                        {{ Form::label('status', Lang::get('common.Status'), ['class' => 'control-label']) }}
                        <span class="mandetory">*</span>
                        {{ Form::select('status', ['A'=>'Active', 'D'=>'Inactive'], '', ['class' => 'form-control']) }}                       
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                    </div>-->
              
                    <div class="form-group">
                        {{ Form::submit(Lang::get('common.btnSubmit'),['class'=>'btn btn-primary']) }}                        
                    </div>
                {{ Form::close() }}
        </div>
        <div class="panel-footer">
            {{ Lang::get('common.manFields') }}
        </div>
    </div>