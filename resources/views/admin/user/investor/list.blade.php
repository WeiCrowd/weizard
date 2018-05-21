@extends('admin.main')

@section('head_icon')
hvr-buzz-out fa fa-user-secret
@endsection

@section('heading')
{{ Lang::get('common.Manage') }} {{ Lang::get('admin/user/investor.Heading') }}
@endsection

@section('sub_heading')
{{ Lang::get('admin/user/investor.Sub_Heading') }}
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12 col-md-12">
        <!-- Green Panel -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>{{ Lang::get('admin/user/investor.investor_list') }}</h4>
                </div>
            </div>
            <!-- Nav tabs -->
             
            
            <!-- Tab panels -->
            <!-- tab content -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="panel-body">
                       <div class="row">
                            <div class="table-responsive">
                                <table id="dataTableExample2" class="table table-bordered table-striped table-hover dataTableExample2">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ Lang::get('admin/user/investor.name') }}</th>
                                            <th>{{ Lang::get('admin/user/investor.email') }}</th>
                                            <th>{{ Lang::get('admin/user/investor.mobile') }}</th>
                                            <th>{{ Lang::get('common.Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($investor_data as $value)
                                        <?php $id = $value['id']; ?>
                                        <tr>
                                            <th scope="row">{!! $i !!}</th>
                                            <td>{{ ucwords($value['name'])}}</td>
                                            <td>{{ ucwords($value['email'])}}</td>
                                            <td>{{ ucwords($value['mobile'])}}</td>
                                            <td><a href="{{url("admin/investor/$id/edit")}}"><button type="button" class="btn btn-primary btn-circle m-b-5"  title="{{ Lang::get('common.Edit') }}" ><i class="glyphicon glyphicon-edit"></i></button></a></td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                    

                                </table>
                            </div>
                        </div>   
                        
                    </div>
                    <div class="panel-footer">
                        {{ $investor->appends($_GET)->links('vendor/pagination/default') }}
                        <div class="pageTotal">{{ Lang::get('common.Total') }} {{ $investor->total() }} {{ Lang::get('common.Found') }}</div>
                    </div>
                </div>
                <!-- / tab 1 -->
                 
            </div>
            <!-- tab content -->
            

        </div>
    </div>

</div>


@endsection

@section('css')
<!-- iCheck -->
<link href="{{ asset('assets/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css"/>
<!-- Bootstrap toggle css -->
<link href="{{ asset('assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- modals css -->
<link href="{{ asset('assets/plugins/modals/component.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('jscript')
<!-- iCheck js -->
<script src="{{ asset('assets/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap toggle -->
<script src="{{ asset('assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">

$("#select_all").change(function () {
    //"select all" change
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});

//".checkbox" change
$('.checkbox').change(function () {
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if (false == $(this).prop("checked")) { //if this item is unchecked
        $("#select_all").prop('checked', false); //change "select all" checked status to false
    }
    //check "select all" if all checkbox items are checked
    if ($('.checkbox:checked').length == $('.checkbox').length) {
        $("#select_all").prop('checked', true);
    }
});

</script>

@endsection
