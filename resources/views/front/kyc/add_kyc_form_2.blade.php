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
                        <li><a class="visited" href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                    </ul>
                    <!-- Pagination -->
                </div>
                <!-- Aside Top -->

                <!-- Aside Center -->
                <div class="panel-aside-center panel-aside-item">
                    <div class="panel-aside-icon"><img src="content/images/panel-info-kyc.svg" alt="KYC" /></div>
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
            {{ Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'validateKycForm','autocomplete'=>'on', 'url'=> route('save_kyc_occupation'), 'enctype' => 'multipart/form-data']) }}
            {{ Form::hidden('id', @$data->id, ['id'=>'edit_id']) }}
            {{ csrf_field() }}
                <div class="form-group-wrap">
                    <h1 class="form-heading marB40 marB20-xs">Occupation, Income and source of founds</h1>

                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.occupation') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('occupation', @$data->occupation, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.occupation'),'id'=>'occupation']) }}
                            <span class="text-danger">{{ $errors->first('occupation') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.occupation_desc') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::text('occupation_desc', @$data->occupation_desc, ['class' => 'form-control','placeholder'=>Lang::get('kyc/kyc.occupation_desc'),'id'=>'occupation_desc']) }}
                            <span class="text-danger">{{ $errors->first('occupation_desc') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label"></label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::checkbox('salary', 'Salary', @$data->salary?'true':'', ['class' => '']) }}{{ Lang::get('kyc/kyc.salary') }}
                            {{ Form::checkbox('saving', 'Saving', @$data->saving?'true':'', ['class' => '']) }}{{ Lang::get('kyc/kyc.saving') }}
                            <span class="text-danger">{{ $errors->first('saving') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Lang::get('kyc/kyc.annual_income') }}:</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Form::select('annual_income', @$annual_income,@$data->annual_income, ['class' => 'form-control', 'id' => "annual_income"]) }}
                            <span class="text-danger">{{ $errors->first('annual_income') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="form-group-label">{{ Form::checkbox('term_conditions', 'Term Conditions', true, ['class' => '']) }}</label>
                        </div>
                        <div class="col-sm-6">
                            {{ Lang::get('kyc/kyc.term_conditions') }}
                            <span class="text-danger">{{ $errors->first('term_conditions') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    

                </div>
                
                <!-- Footer Buttons -->
                <div class="panel-main-btns row marT40">
                    <!-- Using anchor tags for link instead of button submit tag -->
                    <div class="col-xs-6">
                        <a href="{{ route('kyc') }}" class="primary-btn is-slim is-ghost-btn prev-btn">Previous</a>
                    </div>
                    <div class="col-xs-6 text-right">
                        <button type="submit" class="primary-btn is-slim next-btn">
                                    Next
                                </button>
                        
                    </div>
                </div>
                <!-- Footer Buttons -->
                    
            </form>
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
jQuery('#validateKycForm').validate({
        debug: true,
        errorClass: 'text-danger',
        errorElement: 'span',
        rules: {
            occupation: {
                required: true
            },
            term_conditions     : {
                required: true
            }
        },
        messages:{

            occupation:{
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
    