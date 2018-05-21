@extends('admin.main', ['startup_active' => 'active', 'ico_category_active' => 'active'])

@section('head_icon')
  hvr-buzz-out fa fa-user-secret
@endsection

@section('heading')
  @if(@$edit_category->id)
  {{ Lang::get('common.Edit') }} {{ Lang::get('admin/user/icocategory.Heading') }}
  @else
  {{ Lang::get('common.Add') }} {{ Lang::get('admin/user/icocategory.Heading') }}
  @endif
@endsection

@section('sub_heading')
  {{ Lang::get('admin/user/icocategory.Sub_Heading') }}
@endsection

@section('breadcrumb')
{{ Lang::get('common.Manage') }} {{ Lang::get('admin/user/icocategory.Heading') }}
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- Green Panel -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>ICO Category</h4>
                </div>
                <span class="help-span pull-right"><a data-toggle="modal" data-target="#modal-lg">
                    </a></span>
            </div>
            <div class="panel-body">
                @if(@$edit_category->id)
                {{ Form::open(['method' => 'PUT','class'=>'form-horizontal','id'=>'validateIcoForm','autocomplete'=>'off', 'url'=> 'admin/icocategory/'. @$edit_category->id, 'enctype' => 'multipart/form-data']) }}
                {{ Form::hidden('id', @$edit_category->id, ['id'=>'edit_id']) }}
                @else
                {{ Form::open(['method' => 'POST','class'=>'form-horizontal','id'=>'validateIcoForm','autocomplete'=>'off', 'url'=> 'admin/icocategory', 'enctype' => 'multipart/form-data']) }}
                @endif
                {{ csrf_field() }}
                     
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">{{ Lang::get('admin/user/icocategory.name') }}</label>
                        <div class="col-md-6">
                            {{ Form::text('name', @$edit_category->name, ['class' => 'form-control','placeholder'=>Lang::get('admin/user/icocategory.name'),'id'=>'name']) }}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                    <a class="btn btn-primary" href="{{ url('admin/icocategory')}}">Cancel</a>
                </div>
            </div>
            {{ Form::close() }}
            
            </div>
           
        </div>
    </div>
    
</div>

                            
@endsection
@section('css')

@endsection

@section('jscript')

@endsection