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
                    <!--                        <li><a class="visited" href="#">2</a></li>-->
                    <li><a class="active" href="#">2</a></li>
                    <li><a href="#">3</a></li>
                </ul>
                <!-- Pagination -->
            </div>
            <!-- Aside Top -->

            <!-- Aside Center -->
            <div class="panel-aside-center panel-aside-item">
                <div class="panel-aside-icon"><img src="{{ asset('content/images/panel-social-icon.svg') }}" alt="Social" /></div>
                <h5 class="panel-aside-heading">Add Project Details</h5>
                <p class="panel-aside-text">Add project details like Image, Website, Blog, Whitepaper, Social links… </p>
            </div>
            <!-- Aside Center -->

            <!-- Aside Bottom -->
            <div class="panel-aside-bottom panel-aside-item has-border-top">
                <p><a href="mailto:support@weizard" class="text-link">support@weizard.com</a></p>
            </div>
            <!-- Aside Bottom -->

        </div>
<!--        viewSocialData-->
        {{ Form::open(['method' => 'POST','class'=>'panel-main form panel-form has-left-labels','id'=>'validateSocialForm','autocomplete'=>'off', 'url'=> route('team_information'), 'enctype' => 'multipart/form-data']) }}
        <input type="hidden" name="id" value="{{ @$id }}">
        {{ csrf_field() }}
        <div class="form-group-wrap">
            
            <h1 class="form-heading marB40 marB20-xs">Project Details</h1>
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.short_description') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::textarea('short_description', @$ico_detais->short_description, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.short_description'),'id'=>'short_description','size' => '30x5']) }}
                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.concept') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::textarea('concept',  @$ico_detais->concept, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.concept'),'id'=>'concept']) }}
                    <span class="text-danger">{{ $errors->first('concept') }}</span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.video') }}:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::text('video',  @$ico_detais->video, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.video_url'),'id'=>'video']) }}
                    <span class="text-danger">{{ $errors->first('video') }}</span>
                </div>
            </div>
            <!-- Form Group -->
            
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.banner_image') }}:</label>
                </div>
                <div class="col-sm-6">
                    <div class="custom-input-file form-control">
                        <input type="file" class="form-control banner_image inputfile" id="banner_image" name="banner_image">
                        
                        <label>
                            <span class="selected-value">Upload banner image</span>
                        </label>
                    </div>
                    <span class="text-danger">{{ $errors->first('banner_image') }}</span>
                </div>
            </div>
            <!-- Form Group -->

            @if(!empty(@$ico_detais->banner_image))
            <div class="form-group row">
                <div class="col-md-6 control-label">
                    <img src="{{asset('/ICO/BannerImage/'.@$ico_detais->banner_image)}}" width="100px" height="100px">
                    {{ Form::hidden('old_banner_image', @$ico_detais->banner_image) }}
                </div>
            </div>
            @endif

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.logo_image') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    <div class="custom-input-file form-control">
                        <input type="file" class="form-control logo_image inputfile" id="logo_image" name="logo_image" value="{{ @$ico_detais->logo_image }}">
                        
                        <label>
                            <span class="selected-value">Upload Logo image</span>
                        </label>
                    </div>
                    <span class="text-danger">{{ $errors->first('logo_image') }}</span>
                </div>
            </div>
            <!-- Form Group -->

            @if(!empty(@$ico_detais->logo_image))
            <div class="form-group row">
                <div class="col-md-6 control-label">
                    <img src="{{asset('/ICO/LogoImage/'.@$ico_detais->logo_image)}}" width="100px" height="100px">
                    {{ Form::hidden('old_logo_image', @$ico_detais->logo_image, ['id'=>'old_logo_image']) }}
                </div>
            </div>
            @endif

             <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.website') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::text('website',  @$ico_detais->website, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.website_url'),'id'=>'website']) }}
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.blog') }}:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::text('blog',  @$ico_detais->blog, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.blog_url'),'id'=>'blog']) }}
                    <span class="text-danger">{{ $errors->first('blog') }}</span>
                </div>
            </div>
            <!-- Form Group -->

            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.whitepaper') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::text('whitepaper',@$ico_detais->whitepaper, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.whitepaper_url'),'id'=>'whitepaper']) }}
                    <span class="text-danger">{{ $errors->first('whitepaper') }}</span>
                </div>
            </div>
            <!-- Form Group -->
            
            <div id="items">
            <!-- Form Group -->
            @if(count(@$ico_id) >0)
            @foreach(@$ico_id as $value)
            
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.link_type') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::select('link_type[]', [''=>'Select']+@$link_type, @$value->link_type, ['class' => 'form-control','id'=>'link_type0']) }}
                    <span class="text-danger">{{ $errors->first('link_type') }}</span>
                </div>
            </div>
            <!-- Form Group -->
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.url') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::text('url[]',  @$value->url, ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.url'),'id'=>'url0']) }}
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                </div>
            </div>
            <!-- Form Group -->
            @endforeach
            @else
             <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.link_type') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::select('link_type[]', [''=>'Select']+@$link_type, '', ['class' => 'form-control','id'=>'link_type0']) }}
                    <span class="text-danger">{{ $errors->first('link_type') }}</span>
                </div>
            </div>
            <!-- Form Group -->
            <!-- Form Group -->
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                    <label class="form-group-label">{{ Lang::get('startup/ico.url') }}<span class="required">*</span>:</label>
                </div>
                <div class="col-sm-6">
                    {{ Form::text('url[]',  '', ['class' => 'form-control','placeholder'=>Lang::get('startup/ico.url'),'id'=>'url0']) }}
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                </div>
            </div>
            <!-- Form Group -->
            @endif
            
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-sm-4">
                        <a class="uppercase add_field_button" href="javascript:;">+Add More</a>
                </div>
            </div>
        </div>

        <!-- Footer Buttons -->
        <div class="panel-main-btns row marT40">
            <!-- Using anchor tags for link instead of button submit tag -->
            <div class="col-xs-6">
                <a href="{{ url("startup/edit-ico/$id") }}" class="primary-btn is-slim is-ghost-btn prev-btn">Previous</a>
            </div>
            <div class="col-xs-6 text-right">
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
.form-group-main{position: relative;}
.form-group-main a.remove_field {
position: absolute;
right: 60px;
top: 0;
display: block;
padding: 15px;
}
</style>
@endsection


@section('jscript')

<script type="text/javascript">
    $(document).ready(function () {
        
        var old_logo_image = $("#old_logo_image").val();
        if(old_logo_image == undefined){
            jQuery('#validateSocialForm').validate({

                debug: true,
                errorClass: 'text-danger',
                errorElement: 'span',
                rules: {
                short_description: {
                    required: true,
                    maxlength:200
                },
                concept: {
                    required: true
                },
                logo_image: {
                    required: true
                },
                website: {
                    required: true,
                    url: true
                },
                blog: {
                    url: true
                },
                whitepaper: {
                    required: true,
                    url: true
                },
                video: {
                    url: true
                },
                'url[]': {
                    mytst: true
                    },
                    'link_type[]': {
                    linktype: true
                    }

                },
                messages: {
                website: {
                    required: 'Webisite is required',
                    url: 'Invalid URL'
                },
                blog: {
                    url: 'Invalid URL'
                },
                whitepaper: {
                    required: 'Whitepaper is required',
                    url: 'Invalid URL'
                },
                video: {
                    url: 'Invalid URL'
                },

                },
                submitHandler: function (form) {
                    form.submit();
                }

            });
            
        }else{
            jQuery('#validateSocialForm').validate({
                debug: true,
                errorClass: 'text-danger',
                errorElement: 'span',
                rules: {
                short_description: {
                    required: true,
                    maxlength:200
                },
                concept: {
                    required: true
                },
                website: {
                    required: true,
                    url: true
                },
                blog: {
                    url: true
                },
                whitepaper: {
                    required: true,
                    url: true
                },
                video: {
                    url: true
                },                
                'url[]': {
                    mytst: true
                    },
                    'link_type[]': {
                    linktype: true
                    }

                },
                messages: {
                website: {
                    required: 'Webisite is required',
                    url: 'Invalid URL'
                },
                blog: {
                    url: 'Invalid URL'
                },
                whitepaper: {
                    required: 'Whitepaper is required',
                    url: 'Invalid URL'
                },
                video: {
                    url: 'Invalid URL'
                },

                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
            
        }
        
        $.validator.addMethod("mytst", function (value, element) {
        var flag = true;
                
      $("[name^=url]").each(function (i, j) {
        $(this).parent('div').find('span.text-danger ').remove();
        if ($.trim($(this).val()) == '') {
            flag = false;
            $(this).parent('div').append('<span  id="url'+i+'-error" class="text-danger pull-left">URL is required.</span>');
        }
    });
    return flag;
    }, "");
    
     $.validator.addMethod("linktype", function (value, element) {
        var flag = true;
                
      $("[name^=link_type]").each(function (i, j) {
        $(this).parent('div').find('span.text-danger ').remove();
        if ($.trim($(this).val()) == '') {
            flag = false;
            $(this).parent('div').append('<span  id="link_type'+i+'-error" class="text-danger pull-left">Platform is required.</span>');
        }
    });
    return flag;
    }, "");
    
    });
    
       
    var max_fields = 20; //maximum input boxes allowed
    var wrapper = $("#items"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    if(x < max_fields){ //max input box allowed
    x++; //text box increment
    $(wrapper).append('<div class="form-group-main"><div class="form-group row"><div class="col-md-4 col-sm-4"><label class="form-group-label">Platform<span class="required">*</span>:</label></div>' +
    '<div class="col-sm-6">'+ '{{ Form::select('link_type[]', [''=>'Select']+@$link_type, '', ['class' => 'form-control','id'=>'link_type']) }}' +'</div></div>' +
    '<div class="form-group row"><div class="col-md-4 col-sm-4"><label class="form-group-label">URL<span class="required">*</span>:</label></div>'+
    '<div class="col-sm-6"><input class="form-control" id="" type="text" placeholder="URL" name="url[]"/></div></div><a href="#" class="remove_field" title="Remove"><i class="fa fa-times"></i></a></div>'); //add input box
    }
    });
     
$(wrapper).on("click",".remove_field", function(e){ //user click on remove field
        e.preventDefault(); 
        $(this).parent('div.form-group-main').remove(); ;
    });

</script>
@endsection