@extends('admin.main')

@section('head_icon')
hvr-buzz-out fa fa-user-secret
@endsection

@section('heading')
Manage Site Setting
@endsection

@section('sub_heading')
You can manage site setting from here
@endsection

@section('content')
<div class="page-content">

    <div class="container-fluid">

        @if(Session::has('message'))
        <div class="alert alert-dismissable alert-success" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);padding: 10px 5px;height: 35px;margin-top: 10px;width: 100%;">
            <i class="fa fa-check"></i>&nbsp; {{ Session::get('message') }}
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        </div>
        @endif

        @if(Session::has('err_response'))
        <ul>
            @foreach(session('err_response')[0]['error_msg'] as $k=>$err)
            <li style="color: #f00;">{{ $err[0] }}</li>
            @endforeach
        </ul>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>

                    <div class="panel-body">

                        {!!
                        Form::open(
                        array(
                        'name' => 'frmLogin',
                        'id' => 'validate-form',
                        'url' => route('save_site_setting'),
                        'autocomplete' => 'off',
                        'class' => 'form-horizontal',
                        'files' => true
                        )
                        )
                        !!}

                        <div class="form-group">
                            <label class="col-sm-2 control-label site-sett-label"><strong>General Settings</strong></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Site Offline</label>
                            <div class="col-sm-8">
                                
                                  
                                        
                                    <div class="checkbox checkbox-warning reg-check">
                                        <input type="checkbox" id="checkbox-s-m1" <?php if (isset($arrSettingData) && count($arrSettingData) > 0 && $arrSettingData['site_offline'] == "0") { ?>checked=""<?php } ?>  name="site_offline" value="0">
                                        <label for="checkbox-s-m1"></label>
                                    </div>
                                        
                                   
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Site Offline Message</label>
                            <div class="col-sm-9">
                                <textarea class="form-control autosize" name="site_offline_message">{{$arrSettingData['site_offline_message'] or ''}}</textarea>
                            </div>
                        </div>
                        <?php
                        if (isset($arrSettingData['country'])) {
                            $arrSettingCountry = explode(', ', $arrSettingData['country']);
                        } else {
                            $arrSettingCountry = [1];
                        }
                        ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-9" style="border-bottom: 1px solid #ccc;">
                                <span class="icon select_down_button"><i class="fa fa-sort-down"></i></span>
                                <select class="form-control" name="country[]" id="country" multiple="multiple">
                                    @if(isset($arrCountry) && count($arrCountry) > 0)
                                    @foreach($arrCountry as $varData)
                                    <option <?php if (in_array($varData->id, $arrSettingCountry)) { ?>selected=""<?php } ?> value="{{$varData->id}}">{{$varData->country_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                         

                        <div class="form-group">
                            <label class="col-sm-2 control-label site-sett-label"><strong>Site Settings</strong></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Admin Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="admin_email" value="{{$arrSettingData['admin_email'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Admin OTP Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="admin_otp_mobile" value="{{$arrSettingData['admin_otp_mobile'] or ''}}">
                                <span class="admin_otp_mobile_help">Separate By Comma For Multiple Mobile Number</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">From Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="from_email" value="{{$arrSettingData['from_email'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">From Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="from_name" value="{{$arrSettingData['from_name'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">TollFree Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="toll_free_number" value="{{$arrSettingData['toll_free_number'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Copyright Content</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="copyright_content" 
                                       value="{{$arrSettingData['copyright_content'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="addon3">Site Logo</label>
                            <div class="col-sm-9 input-group">
                                <input type="file" id="inputFile4" name="site_logo">
                                <input type="text" readonly="" id="addon3" class="form-control" placeholder="" value="{{ $arrSettingData['site_logo'] or ''}}">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="material-icons">attach_file</i>
                                    </button>
                                </span>
                            </div>
                            @if(count($arrSettingData)>0)
                            @if(isset($arrSettingData) && $arrSettingData['site_logo'] != '')
                            <img style="width: 100px;margin: 1% 0px -27px 18%;box-shadow: 2px 2px 5px 2px #ccc;" 
                                 src="{{ asset('assets/site_logo/'.$arrSettingData['site_logo']) }}" />
                            @endif
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Site Favicon</label>
                            <div class="col-sm-9 input-group">
                                <input type="file" name="site_favicon">
                                <input type="text" readonly="" class="form-control" value="{{$arrSettingData['site_favicon'] or ''}}">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="material-icons">attach_file</i>
                                    </button>
                                </span>
                            </div>
                            @if(isset($arrSettingData) && isset($arrSettingData['site_favicon']) && $arrSettingData['site_favicon'] != '')
                            <img style="width: 100px;margin: 1% 0px -27px 18%;box-shadow: 2px 2px 5px 2px #ccc;" 
                                 src="{{ asset('assets/site_favicon/'.$arrSettingData['site_favicon']) }}" />
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label site-sett-label"><strong>Social Settings</strong></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Facebook Link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="facebook_link" value="{{$arrSettingData['facebook_link'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Twitter Link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="twitter_link" value="{{$arrSettingData['twitter_link'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">LinkedIn Link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="linkedin_link" value="{{$arrSettingData['linkedin_link'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label site-sett-label"><strong>SMS Settings</strong></label>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Key</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sms_key" value="{{$arrSettingData['sms_key'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sender ID</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sms_sender_id" value="{{$arrSettingData['sms_sender_id'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sms_url" value="{{$arrSettingData['sms_url'] or ''}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Timeout</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sms_timeout" value="{{$arrSettingData['sms_timeout'] or ''}}">
                            </div>
                        </div>

                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-2" style="text-align: center;">
                                <button type="submit" class="btn-raised btn-success btn">Submit</button>
                                <a href="{{route('admin_site_setting')}}">
                                    <button type="button" class="btn-raised btn-danger btn">Cancel</button>
                                </a>
                            </div>
                        </div>
                    </div>

                    {!! Form::close()!!}

                </div>
            </div>
        </div>

    </div> <!-- .container-fluid -->
</div> <!-- #page-content -->
@endsection

@section('pageTitle')
Manage Site Settings
@endsection

@section('css')
<style type="text/css">
    .site-sett-label{
        background: #ccc;
        width: 98%!important;
        padding: 10px;
    }
    .admin_otp_mobile_help{
        font-size: 10px;
        position: absolute;
        color: #f00;
        top: 40px;
    }
    .mode_cls{
        position: relative;
        top: -35px;
        left: 35px;
    }
    .select_down_button {
        position: absolute;
        right: 22px;
        top: 16px;
    }
    .ms-drop ul > li label{
        text-align: left!important;
    }
</style>
<link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/multiple-select.css') }}">

@endsection

@section('jscript')
<script src="{{ asset('assets/js/sitesetting.js') }}"></script>
<script src="{{ asset('assets/js/jquery.autosize-min.js') }}"></script>
<script src="{{ asset('assets/js/multiple-select.js') }}"></script>
<script type="text/javascript">
$("#country").multipleSelect({
    filter: true
});
</script>
@endsection