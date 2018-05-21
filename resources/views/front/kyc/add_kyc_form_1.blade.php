@extends('layouts.dashboard')
@section('content')

<!-- Dashboard Content -->
        <div class="dashboard-content">
        
        <!-- Panel -->
        <div class="panel marAuto">
            <div class="panel-aside">

                <!-- Aside Top -->
                <div class="panel-aside-top panel-aside-item has-border-bottom">
                    <!-- Pagination -->
                    <ul class="pagination">
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        
                    </ul>
                    <!-- Pagination -->
                </div>
                <!-- Aside Top -->

                <!-- Aside Center -->
                <div class="panel-aside-center panel-aside-item">
                    <div class="panel-aside-icon"><img src="{{ asset('content/images/panel-info-kyc.svg') }}" alt="KYC" /></div>
                    <h5 class="panel-aside-heading">Add KYC Details</h5>
                    <p class="panel-aside-text">Add details like Name, Gender, Address, Apartment, State, Country, Zip Code...</p>
                </div>
                <!-- Aside Center -->

                <!-- Aside Bottom -->
                <div class="panel-aside-bottom panel-aside-item has-border-top">
                    <p><a href="#" class="theme-color medium-font">Save and Exist</a></p>
                    <p><a href="#" class="text-link">Call 0043-57385 for help</a></p>
                </div>
                <!-- Aside Bottom -->

            </div>
             
                {{ Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'validateKycForm','autocomplete'=>'on', 'url'=> route('save_kyc'), 'enctype' => 'multipart/form-data']) }}
            {{ Form::hidden('id', @$data->id, ['id'=>'edit_id']) }}
            {{ csrf_field() }}
                     
                <div class="form-group-wrap">
                    <h1 class="form-heading marB40 marB20-xs">KYC Information</h1>

                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('common.Name') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('name', @$data->name, ['class' => 'form-control','placeholder'=>Lang::get('common.Name'),'id'=>'name']) }}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.gender') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::radio('gender', 'Male', @$data->gender == 'Male'?'true':'', ['class' => '']) }}{{ Lang::get('kyc/kyc.male') }}
                            {{ Form::radio('gender', 'Female', @$data->gender == 'Female'?'true':'', ['class' => '']) }}{{ Lang::get('kyc/kyc.female') }}
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.address') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('address', @$data->address, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.address'),'id'=>'address']) }}
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.apartment') }}:</label>
                        </div>
                        <div class="col-sm-6">
                           {{ Form::text('apartment_floor', @$data->apartment_floor, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.apartment'),'id'=>'apartment_floor']) }}
                            <span class="text-danger">{{ $errors->first('apartment_floor') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.other') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('other', @$data->other, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.other'),'id'=>'other']) }}
                            <span class="text-danger">{{ $errors->first('other') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->

                   
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.city') }}:</label>
                        </div>
                        <div class="col-sm-6">
                           {{ Form::text('city', @$data->city, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.city'),'id'=>'city']) }}
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->

                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.state') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('state', @$data->state, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.state'),'id'=>'state']) }}
                            <span class="text-danger">{{ $errors->first('state') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.country') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::select('country_id', [''=>'Please Select']+@$country,@$data->citizenship, ['class' => 'form-control', 'id' => "country_id"]) }}
                            <span class="text-danger">{{ $errors->first('country_id') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.postal_code') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('postal_code', @$data->postal_code, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.postal_code'),'id'=>'postal_code']) }}
                            <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.country_code') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('country_code', @$data->country_code, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.country_code'),'id'=>'country_code']) }}
                            <span class="text-danger">{{ $errors->first('country_code') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.mobile') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('mobile', @$data->mobile, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.mobile'),'id'=>'mobile']) }}
                            <span class="text-danger">{{ $errors->first('mobile') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.dob') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('dob',@$data->dob!=""?date('d/m/Y',strtotime(@$data->dob)):'', ['class' => 'form-control form_datetime','placeholder'=>Lang::get('kyc/kyc.dob'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy']) }}
                            <span class="text-danger">{{ $errors->first('dob') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.id_type') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('id_type', @$data->id_type, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.id_type'),'id'=>'id_type']) }}
                            <span class="text-danger">{{ $errors->first('id_type') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.issue_date') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('issue_date',@$data->issue_date!=""?date('d/m/Y',strtotime(@$data->issue_date)):'', ['class' => 'form-control form_datetime','placeholder'=>Lang::get('kyc/kyc.issue_date'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy']) }}
                            <span class="text-danger">{{ $errors->first('issue_date') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.valid_date') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('valid_date',@$data->valid_date!=""?date('d/m/Y',strtotime(@$data->valid_date)):'', ['class' => 'form-control form_datetime1','placeholder'=>Lang::get('kyc/kyc.valid_date'),'readonly'=>'true', 'data-date-format' =>'dd/mm/yyyy']) }}
                            <span class="text-danger">{{ $errors->first('valid_date') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->

                </div>
                
                 
                
                 <!-- Footer Buttons -->
        <div class="panel-main-btns row marT40">
            <!-- Using anchor tags for link instead of button submit tag -->
            <div class="col-xs-6">
                <button type="submit" class="primary-btn is-slim next-btn">
                    Next
                </button>
              
            </div>
        </div>
        <!-- Footer Buttons -->
                    
            {{ Form::close() }}
        </div>
        <!-- Panel -->
        
        </div>
        <!-- Dashboard Content -->
        
  
@endsection

@section('css')

<style>
  .remove-btn {
    display: block;
    border: solid 1px #ccc;
    padding: 2px 0;
    border-radius: 2px;
    width: 74px;
    margin: 0px auto 17px;
    text-align: center;cursor:pointer;
  }
</style>
@endsection

@section('jscript')

<script type="text/javascript">
 $(document).ready(function() {
     var date = new Date();
     $('.form_datetime').datetimepicker({
       pickTime: false,
       todayBtn: true,
       todayHighlight: true,
       minView: 2,
       format: 'dd/mm/yyyy',
       autoclose: true,
       endDate :  date,
    });
    
    $('.form_datetime1').datetimepicker({
       pickTime: false,
       todayBtn: true,
       todayHighlight: true,
       minView: 2,
       format: 'dd/mm/yyyy',
       autoclose: true,
    });
    
    
  jQuery('#validateKycForm').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            first_name: {
                required: true
            },
            last_name: {
                required: true
            },
            gender: {
                required: true
            },
            address: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            contry: {
                required: true
            },
            mobile: {
                required: true
            },
            
            dob: {
                required: true
            },
            id_type: {
                required: true
            },
            issue_date: {
                required: true
            },
            valid_date: {
                required: true
            }            
        },
        messages:{

            first_name:{
              required: 'This field is required.'
            }
        },
    submitHandler: function (form) {
            form.submit();
        }

    });
    
    
 
});
   
</script>
@endsection
    