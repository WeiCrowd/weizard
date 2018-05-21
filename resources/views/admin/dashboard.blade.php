@extends('admin.main')

@section('head_icon')
pe-7s-world
@endsection

@section('heading')
{{ Lang::get('common.Dashboard') }}
@endsection

@section('sub_heading')
{{ Lang::get('common.Sub_Dashboard') }}
@endsection
@section('breadcrumb')
{{ Lang::get('common.Dashboard') }}
@endsection
@section('content')

@if(Auth::user()->user_type == 'A')
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">Two-Factor Authentication</div>

            <div class="panel-body">
                @if (Auth::user()->google2fa_secret)
                <a href="{{ url('2fa/disable') }}" class="btn btn-warning">Disable 2FA</a>
                @else
                <a href="{{ url('2fa/enable') }}" class="btn btn-primary">Enable 2FA</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endif   


<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">{{ count(@$category) }}</span></h2>
                    <div class="small">ICO Category</div>
                    <div class="sparkline1 text-center"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">{{ count(@$activeICO) }}</span> </h2>
                    <div class="small">Active ICO</div>
                    <div class="sparkline2 text-center"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">{{ count(@$inactiveICO) }}</span></h2>
                    <div class="small">Inactive ICO</div>
                    <div class="sparkline3 text-center"></div>
                </div>
            </div>
        </div>
    </div>    
</div>


@endsection

@section('css')
<style>

    .dashboard-detail ul {
  margin: 0;
  text-align: center;
}
.dashboard-detail li {
    background: #f5f5f5 none repeat scroll 0 0;
    box-shadow: 0 2px 4px #999;
    display: inline-block;
    margin: 0 9px 45px;
    position: relative;
    text-align: center;
    vertical-align: top;
    width: 220px;
}
.dashboard-detail a::before {
  background-image: url("../images/sprit.png");
  background-position: -8px -359px;
  content: "";
  height: 58px;
  left: 17px;
  position: absolute;
  top: 13px;
  width: 76px;
}

.dashboard-detail li.General a::before {
  background-position: -8px -359px;
}
.dashboard-detail a {
    color: #222;
    display: inline-block;
    font-size: 16px;
    padding: 21px 0 20px 44px;
    text-decoration: none;
}
    </style>

<link href="{{ asset('assets/plugins/toastr/toastr.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/emojionearea/emojionearea.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/plugins/monthly/monthly.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('jscript')
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/sparkline/sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/datamaps/d3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/datamaps/topojson.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/datamaps/datamaps.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/counterup/waypoints.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/emojionearea/emojionearea.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/monthly/monthly.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/dist/js/dashboard.js') }}" type="text/javascript"></script>

<script>
$(document).ready(function () {

    "use strict";
    $('.count-number').counterUp({
        delay: 10,
        time: 5000
    });

    var basic_choropleth = new Datamap({
        element: document.getElementById("map1"),
        projection: 'mercator',
        fills: {
            defaultFill: "#37a000",
            authorHasTraveledTo: "#fa0fa0"
        },
        data: {
            USA: {fillKey: "authorHasTraveledTo"},
            JPN: {fillKey: "authorHasTraveledTo"},
            ITA: {fillKey: "authorHasTraveledTo"},
            CRI: {fillKey: "authorHasTraveledTo"},
            KOR: {fillKey: "authorHasTraveledTo"},
            DEU: {fillKey: "authorHasTraveledTo"}
        }
    });

    var colors = d3.scale.category10();

    window.setInterval(function () {
        basic_choropleth.updateChoropleth({
            USA: colors(Math.random() * 10),
            RUS: colors(Math.random() * 100),
            AUS: {fillKey: 'authorHasTraveledTo'},
            BRA: colors(Math.random() * 50),
            CAN: colors(Math.random() * 50),
            ZAF: colors(Math.random() * 50),
            IND: colors(Math.random() * 50)
        });
    }, 2000);

    $('.chat_list').slimScroll({
        size: '3px',
        height: '305px'
    });

    $('.message_inner').slimScroll({
        size: '3px',
        height: '320px'
    });

    $(".emojionearea").emojioneArea({
        pickerPosition: "top",
        tonesStyle: "radio"
    });

    $('#m_calendar').monthly({
        mode: 'event',
        xmlUrl: 'events.xml'
    });

    $('.sparkline1').sparkline([4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 7, 4, 3, 1, 5, 7, 6, 6, 5, 5, 4, 4, 3, 3, 4, 4, 5], {
        type: 'bar',
        barColor: '#37a000',
        height: '35',
        barWidth: '3',
        barSpacing: 2
    });

    $(".sparkline2").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {
        type: 'line',
        height: '35',
        width: '100%',
        lineColor: '#37a000',
        fillColor: '#fff'
    });

    $(".sparkline3").sparkline([2, 5, 3, 7, 5, 10, 3, 6, 5, 7], {
        type: 'line',
        height: '35',
        width: '100%',
        lineColor: '#37a000',
        fillColor: '#fff'
    });

    $(".sparkline4").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
        type: 'line',
        height: '35',
        width: '100%',
        lineColor: '#37a000',
        fillColor: 'rgba(55, 160, 0, 0.7)'
    });

    $(".sparkline5").sparkline([4, 2], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

    $(".sparkline6").sparkline([3, 2], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

    $(".sparkline7").sparkline([4, 1], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

    $(".sparkline8").sparkline([1, 3], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

    $(".sparkline9").sparkline([3, 5], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

});
</script>
@endsection

