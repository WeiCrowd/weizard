@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
        
                <div class="panel-heading">{{ Lang::get('startup/ico.view_ico') }}</div>
                 
                <div class="panel-body">
                    
            
            <div class="form-horizontal">         
            <div class="Address row">
                <div class="col-md-12 bottom20">
                    <label><strong>Basic Detail :</strong></label>
                </div>
                <div class=" ">
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.ico_type') }} :</label>
                        <div class="col-md-6">
                            {{@$ico_data['ico_type'] == "I"?"ICO":"Pre ICO"}}
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.ico_name') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['name'] }}
                        </div>
                    </div>
                    
                    <div class="form-group" id="symbol_div">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.symbol') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['symbol'] }}
                        </div>
                    </div>
                    
                    <div class="form-group" id="symbol_img_div">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.symbol_image') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['symbol_image'] }}
                        </div>
                    </div>
                    
                    @if(!empty(@$ico_data['symbol_image']))
                    <div class="form-group">
                        <div class="col-md-6 control-label">
                            <img src="{{asset('/ICO/SymbolImage/'.@$ico_data['symbol_image'])}}" width="100px" height="100px">
                            {{ Form::hidden('old_symbol_image', @$ico_data['symbol_image'],['id'=>'old_symbol_image']) }}
                        </div>
                    </div>
                    @endif
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.short_description') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['short_description'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.concept') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['concept'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.start_time') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['start_time'] }}
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.end_time') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['end_time'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.soft_cap') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['soft_cap'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.technology') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['technology'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.origin_country') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['origin_country'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.kyc_id') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['kyc_id'] }}
                        </div>
                    </div>
                    
                    
                    @if(!empty(@$ico_data['banner_image']))
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.banner_image') }} :</label>
                        <div class="col-md-6">
                            <img src="{{asset('/ICO/BannerImage/'.@$ico_data['banner_image'])}}" width="100px" height="100px">
                        </div>
                    </div>
                    @endif
                                       
                    
                   
                    @if(!empty(@$ico_data['logo_image']))
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.logo_image') }} :</label>
                        <div class="col-md-6">
                            <img src="{{asset('/ICO/LogoImage/'.@$ico_data['logo_image'])}}" width="100px" height="100px">
                        </div>
                    </div>
                    @endif
                    
                    
                    @if(!empty(@$ico_data['kyc_doc']))
                    <div class="form-group">
                        <label for="kyc_doc" class="col-md-4 control-label">{{ Lang::get('startup/ico.kyc_doc') }}</label>
                        <div class="col-md-6">
                            <img src="{{asset('/ICO/KycDoc/'.@$ico_data['kyc_doc'])}}" width="100px" height="100px">
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
                    
            <div class="Address row">
                <div class="col-md-12 bottom20">
                    <label><strong>Social Links :</strong></label>
                </div>
                <div class=" ">
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.website') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['website'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.blog') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['blog'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.whitepaper') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['whitepaper'] }}
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.facebook') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['facebook'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.twitter') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['twitter'] }}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.linkedin') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['linkedin'] }}
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.slack_chat') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['slack_chat'] }}
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.telegram_chat') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['telegram_chat'] }}
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.github') }} :</label>
                        <div class="col-md-6">
                            {{ @$ico_data['github'] }}
                        </div>
                    </div>
                    
                </div>
            </div>
            
            
            <div class="Address row">
                <div class="col-md-12 bottom20">
                    <label><strong>Team :</strong></label>
                </div>
                
                @if(count($ico_team)>0)
                <div class="member_name">
                @foreach($ico_team as $team_data)
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.member_name') }} :</label>
                        <div class="col-md-6">
                            {{ @$team_data['member_name'] }}
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ Lang::get('startup/ico.member_designation') }} :</label>
                        <div class="col-md-6">
                            {{ @$team_data['member_designation'] }}
                        </div>
                    </div>
                @endforeach
                </div>
                @endif
                
            </div>
                       <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/') }}" style="cursor: pointer;" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('jscript')

<script type="text/javascript">
 $(document).ready(function() {
    var id = $("#edit_id").val();
    
    if(id != ''){
        var symImg = $("#old_symbol_image").val();
        if(typeof symImg == 'undefined'){
            $("#symbol_div").show();
            $("#symbol_img_div").hide();
        }else{
            $("#symbol_div").hide();
            $("#symbol_img_div").show();
        }
    } 
});
</script>
@endsection

    