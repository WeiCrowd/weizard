@extends('admin.main')

@section('head_icon')
hvr-buzz-out fa fa-user-secret
@endsection


@section('heading')
{{ Lang::get('common.Manage') }} {{ Lang::get('admin/AccessManagement/user.HEADING') }}
@endsection

@section('sub_heading')
{{ Lang::get('admin/AccessManagement/user.SUB_HEADING') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-8">
        <!-- Primary Panel -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>{{ Lang::get('admin/AccessManagement/user.USER_LIST') }}</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ Lang::get('common.Name') }}</th>
                                <th>{{ Lang::get('common.Email') }}</th>
                                <th>{{ Lang::get('common.Mobile') }}</th>
                                <th>{{ Lang::get('common.Role') }}</th>
                                <th>{{ Lang::get('common.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($user as $value)
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td>{{ ucwords($value->name)}}</td>
                                <td>{{ $value->email}}</td>
                                <td>{{ $value->mobile}}</td>
                                <td>{{ $value->role }}</td>
                                <td> 
                                    <a href="{{url("admin/user/$value->id/edit")}}"><button type="button" class="btn btn-primary btn-circle m-b-5"  title="{{ Lang::get('common.Edit') }}" ><i class="glyphicon glyphicon-edit"></i></button></a>
                                    {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type'=>'button', 'class'=>'btn btn-danger btn-circle m-b-5 delete', 'title' => Lang::get("common.Delete"),'data-toggle'=>'modal','data-target'=>'#modal-lg','data-link'=>url("admin/user/$value->id") )) }}

                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                {{ $user->links('vendor/pagination/default') }}
                <div class="pageTotal">{{ Lang::get('common.Total') }} {{ $user->total() }} {{ Lang::get('common.Found') }}</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <!-- Success Panel -->
        @if(isset($edit_user))            
        @include('admin/acl/user/edit')
        @else
        @include('admin/acl/user/create')
        @endif
    </div>
</div>


<!-- Modal large -->
<div class="modal fade" id="modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Delete User</h1>
            </div>
            <div class="modal-body">
                <p>Do you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                {!! Form::open(
                array(
                'name' => 'frmDeluser',
                'id' => 'userdeleteform',
                'autocomplete' => 'off',
                'class' => 'form-horizontal row-border',
                'files' => true
                )
                )
                !!}

                {!! Form::hidden('_method', 'DELETE') !!}
                {!! Form::submit('DELETE', array('class'=>'btn btn-success')) !!}
                {!! Form::button('CLOSE', array('class'=>'btn btn-danger','data-dismiss'=>'modal')) !!}

                {!! Form::close()!!}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@section('jscript')

<script type="text/javascript">
    $(document).ready(function () {

        $('#validateForm').validate({// initialize the plugin
            debug: true,
            errorClass: 'text-danger',
            errorElement: 'span',
            rules: {
                name: {
                    required: true
                },
                password: {
                    required: true,
                    rangelength: [8, 15],
                    pwcheck: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password",
                },
                email: {
                    required: true,
                    email: true
                },
                mobile: {
                    required: true,
                    number: true
                }
            },
            messages: {

                password: {
                    pwcheck: 'This field should contain min 4 and max 15 with atleast 1 number, 1 alphabet, and 1 special character.'
                }

            },
            submitHandler: function (form) {
                form.submit();
            }
        });

        $.validator.addMethod("pwcheck", function (value) {
            return /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,15}$/.test(value)

        });

        $('.delete').click(function () {
            var dellink = $(this).data('link');
            $("#userdeleteform").attr('action', dellink);
        });

   

        $('#mobile').keydown(function (e) {
            if (e.shiftKey || e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                    e.preventDefault();
                }
            }
        });
    });
</script>

@endsection
