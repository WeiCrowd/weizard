@extends('layouts.dashboard')

@section('content')
 <!-- Dashboard Content -->
        <div class="dashboard-content">
        <div class="hidden-md hidden-lg">@include('front.common.responsive_left_menu')
            </div>
        <!-- Panel -->
        <div class="panel marAuto">
            <div class="panel-aside">

                <!-- Aside Top -->
                <div class="panel-aside-top panel-aside-item has-border-bottom">
                    <!-- Pagination -->
                    <ul class="pagination">
                        <li><a class="visited" href="#">1</a></li>
                        <li><a class="visited" href="#">2</a></li>
                        <li><a class="active" href="#">3</a></li>
                    </ul>
                    <!-- Pagination -->
                </div>
                <!-- Aside Top -->

                <!-- Aside Center -->
                <div class="panel-aside-center panel-aside-item">
                    <div class="panel-aside-icon"><img src="{{ asset('content/images/panel-team-information.svg') }}" alt="Team" /></div>
                    <h5 class="panel-aside-heading">Add Team Details</h5>
                    <p class="panel-aside-text">Add details like Member name, member designation…</p>
                </div>
                <!-- Aside Center -->

                <!-- Aside Bottom -->
                <div class="panel-aside-bottom panel-aside-item has-border-top">
                    <p><a href="#" class="text-link">Call 0043-57385 for help</a></p>
                </div>
                <!-- Aside Bottom -->

            </div>
           {{ Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'validateTeamForm','autocomplete'=>'off', 'url'=> route('save_ico'), 'enctype' => 'multipart/form-data']) }}
        <input type="hidden" name="id" value="{{ @$ico_id->id }}">
        {{ csrf_field() }}
               
                <div class="form-group-wrap team-information-wrap">
                    <h1 class="form-heading marB40 marB20-xs">Team Information</h1>
                    
                    <!-- Team Block -->
                    <div class="team-block-inner">
                         <div class="form-team-block">
                    @if(count(@$teamData[0]['icoTeamRel'])>0)
                    @php $i=1; @endphp
                    @foreach(@$teamData[0]['icoTeamRel'] as $teamVal)
                    
                       
                    @if(@$i!=1)
                    <span class="form-team-block-remove">Remove</span>
                    @endif
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label">{{ Lang::get('startup/ico.member_name') }}<span class="required">*</span>:</label>
                        </div>
                        <div class="col-sm-6">
                          {{ Form::text('member_name[]',@$teamVal['member_name'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_name'),'id'=>'member_name']) }}
                            <span class="text-danger">{{ $errors->first('member_name') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label">{{ Lang::get('startup/ico.member_designation') }}<span class="required">*</span>:</label>
                        </div>
                        <div class="col-sm-6">
                           {{ Form::text('member_designation[]',@$teamVal['member_designation'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_designation'),'id'=>'member_designation']) }}
                            <span class="text-danger">{{ $errors->first('member_designation') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                     <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label">{{ Lang::get('startup/ico.linkedin_url') }}:</label>
                        </div>
                        <div class="col-sm-6">
                           {{ Form::text('linkedin_url[]',@$teamVal['linkedin_url'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.linkedin_url'),'id'=>'linkedin_url']) }}
                            <span class="text-danger">{{ $errors->first('linkedin_url') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                   
                   @php $i++; @endphp
                    @endforeach
                    @else
                    <span class="form-team-block-remove">Remove</span>
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label">{{ Lang::get('startup/ico.member_name') }}<span class="required">*</span>:</label>
                        </div>
                        <div class="col-sm-6">
                          {{ Form::text('member_name[]',@$teamVal['member_name'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_name'),'id'=>'member_name']) }}
                            <span class="text-danger">{{ $errors->first('member_name') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label">{{ Lang::get('startup/ico.member_designation') }}<span class="required">*</span>:</label>
                        </div>
                        <div class="col-sm-6">
                           {{ Form::text('member_designation[]',@$teamVal['member_designation'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.member_designation'),'id'=>'member_designation']) }}
                            <span class="text-danger">{{ $errors->first('member_designation') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    
                    <!-- Form Group -->
                    <div class="form-group row">
                        <div class="col-md-4 col-sm-5">
                            <label class="form-group-label">{{ Lang::get('startup/ico.linkedin_url') }}:</label>
                        </div>
                        <div class="col-sm-6">
                           {{ Form::text('linkedin_url[]',@$teamVal['linkedin_url'], ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.linkedin_url'),'id'=>'linkedin_url']) }}
                            <span class="text-danger">{{ $errors->first('linkedin_url') }}</span>
                        </div>
                    </div>
                    <!-- Form Group -->
                    @endif
                     </div>
                     </div>
                    <!-- Team Block -->
                     
                    <!-- Form Group -->
                    <div class="form-group row marT30">
                        <div class="col-md-12">
                            <a class="uppercase add-member-btn" href="javascript:;">+Add More</a>
                        </div>
                    </div>
                    <!-- Form Group -->

                </div>
                
                <!-- Footer Buttons -->
                    <div class="panel-main-btns row marT40"><!-- Using anchor tags for link instead of button submit tag -->
                       <div class="col-xs-6">
                            <a href="{{ url("startup/social-inform/$ico_id->id") }}" class="primary-btn is-slim is-ghost-btn prev-btn">Previous</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="primary-btn is-slim next-btn">
                    Submit
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

@section('jscript')

<script type="text/javascript">
    $(document).ready(function () {
        jQuery('#validateTeamForm').validate({

            debug: true,
            errorClass: 'text-danger',
            errorElement: 'span',
            rules: {
                'member_name[]': {
                    mytst: true
                },
                'member_designation[]': {
                    designation: true
                },
                'linkedin_url[]': {
                    url: true
                }
            },
            messages: {

                member_name: {
                    required: 'This field is required.'
                }
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
        
    $.validator.addMethod("mytst", function (value, element) {
      var flag = true;

    $("[name^=member_name]").each(function (i, j) {
      $(this).parent('div').find('span.text-danger ').remove();
      if ($.trim($(this).val()) == '') {
          flag = false;
          $(this).parent('div').append('<span  id="url'+i+'-error" class="text-danger pull-left">Member name is required.</span>');
      }
    });
    return flag;
    }, "");
    
    $.validator.addMethod("designation", function (value, element) {
      var flag = true;

    $("[name^=member_designation]").each(function (i, j) {
      $(this).parent('div').find('span.text-danger ').remove();
      if ($.trim($(this).val()) == '') {
          flag = false;
          $(this).parent('div').append('<span  id="url'+i+'-error" class="text-danger pull-left">Member designation is required.</span>');
      }
    });
    return flag;
    }, "");
    
    });

</script>
@endsection