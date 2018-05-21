@extends('layouts.web')

@section('pageTitle')
List your ICO for Free - WeiZard
@endsection

@section('pageMetaDes')
Get your ICO listed for free on WeiZard - An ICO listing and rating site powered by WeiCrowd having past, current and upcoming ICO details.
@endsection

@section('canonicalURL'){{url()->current()}}@endsection

@section('content')
 
        <!-- Body Content -->
        <div id="body-content">

            <!-- Home Banner -->
            <div class="site-banner page-banner ico-page-front">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="site-banner-text full-max-width text-center">
                                 <div class="ico-sale"><a href="https://www.weicrowd.com/" target="_blank"><img src="{{ asset('content/images/ico-sale.png') }}" alt=""></a></div>
                                <h1 class="site-banner-heading wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s">ICO Listing and Rating by WeiCrowd</h1>
                                @if (Auth::check())
                                    <a href="{{ url('/startup/add-ico')}}" class="primary-btn theme2-btn highlight-btn">List Your ICO </a>
                                @else
                                    <a href="{{ url('/login')}}" class="primary-btn theme2-btn highlight-btn">List Your ICO </a>
                                @endif
                                <a href="{{ url('/ico-listing-bounty')}}" class="primary-btn theme2-btn highlight-btn">ICO Listing Bounty</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Home Banner -->
        </div>
        <!-- Body Content -->

         <!-- Upcoming Tokens -->
       <div class="section has-less-spacing with-bg upcoming-token">
            <div class="container">
                <!-- Listing Filters -->
                            <div class="row listing-filters">
                                <h2 class="col-sm-5 section-heading small-heading">ICO</h2>
                                <div class="frmSearch col-sm-4 col-md-3">
                                    {{ Form::text('ico_name', '',['class' => 'form-control','id'=>'search-box', 'placeholder' => 'Enter ICO Name']) }}
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <div id="suggesstion-box"></div>
                                    
                                </div>
                                <div class="col-sm-7">
                                   <div class="selectbox-group">
                                    <h4 class="selectbox-group-heading">Filter By:</h4>
                                    <ul class="selectbox-group-list">
                                    <li>
                                        {{ Form::select('category_id', [''=>'Category']+@$category, @$edit_ico->category_id, ['class' => 'listing-filters-select theme-selectbox form-control','id'=>'category_id']) }}
                                    </li>
                                    <li>
                                        @php 
                                            $currentYear = date('Y');
                                            $endYear = $currentYear + 1;
                                        @endphp
                                        <select class="listing-filters-select theme-selectbox form-control" id ="datewiseCategory">
                                            <option value="">Year</option>
                                            @php for($i = 10; $i > 4; $i--){ @endphp
                                                <option value="{{$endYear}}">{{$endYear}}</option>
                                            @php $endYear--; } @endphp
                                        </select>
                                    </li>
                                    </ul>
                                    <button class="primary-btn theme2-btn" id="resetFilter">Reset</button>
                                   </div>
                                </div>
                            </div>
                            <!-- Listing Filters -->
                <div id="icoListDiv">
                <div class="row">
                    <div class="col-xs-12">
                         <div class="card">
                             <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab">
                                  <li class="nav-item active">
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-expanded="true">Present</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-expanded="false">Upcoming</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tab3" role="tab" aria-expanded="false">Past</a>
                                        </li>
                                </ul>

                                <div class="tab-content">

                                  <!-- Show this tab by adding `active` class -->
                                  <div class="tab-pane fade in active" id="tab1">
                                    <div class="head-info">
                                        @if(count(@$presentIcoData)>0)
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach(@$presentIcoData as $icoVal)
                                              <tr>
                                                <td class="logo"><a href="{{url('ico/'.str_replace(' ', '-', $icoVal['name']))}}"><img width="170" height="26" src="{{ url('/') }}/ICO/LogoImage/{{ $icoVal['logo_image'] }}" alt="Logo"></a></td>
                                                <td class="name"><a href="{{url('ico/'.str_replace(' ', '-', $icoVal['name']))}}">{{ ucwords($icoVal['name'])}}</a></td>
                                                <td class="start-date">
                                                   @php $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                    @endphp 
                                                    {{ @$actualStartDate }}                                                    
                                                </td>
                                                <td class="close-date">
                                                    @php $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                    @endphp 
                                                    {{ $actualEndDate }}
                                                </td>
                                                <td class="category">{{ ucfirst($icoVal->IcoRel['name'])}}</td>
                                                <td class="category">{{ date("Y",strtotime($startDate[0]))}}</td>
                                                <td class="website"><a href="{{ ucfirst($icoVal['website'])}}" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  @endforeach
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        {{ @$presentIcoData->appends($_GET)->links('vendor/pagination/default') }}
                                        <div class="pageTotal">{{ Lang::get('common.Total') }} {{ @$presentIcoData->total() }} {{ Lang::get('common.Found') }}</div>
                                    </div>
                                </div>
                                         @else
                                            <p>No record found...</p>
                                                @endif
                                    </div>
                                  </div>

                                  <div class="tab-pane fade" id="tab2">
                                    <div class="head-info">
                                        @if(count(@$upcomingIcoData)>0)
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach(@$upcomingIcoData as $icoVal)
                                              <tr>
                                                <td class="logo"><a href="{{url('ico/'.str_replace(' ', '-', $icoVal['name']))}}"><img width="170" height="26" src="{{ url('/') }}/ICO/LogoImage/{{ $icoVal['logo_image'] }}" alt="Logo"></a></td>
                                                <td class="name"><a href="{{url('ico/'.str_replace(' ', '-', $icoVal['name']))}}">{{ ucwords($icoVal['name'])}}</a></td>
                                                <td class="start-date">
                                                   @php $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                    @endphp 
                                                    {{ @$actualStartDate }}                                                    
                                                </td>
                                                <td class="close-date">
                                                    @php $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                    @endphp 
                                                    {{ $actualEndDate }}
                                                </td>
                                                <td class="category">{{ ucfirst($icoVal->IcoRel['name'])}}</td>
                                                <td class="category">{{ date("Y",strtotime($startDate[0]))}}</td>
                                                <td class="website"><a href="{{ ucfirst($icoVal['website'])}}" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  @endforeach
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        {{ @$upcomingIcoData->appends($_GET)->links('vendor/pagination/default') }}
                                        <div class="pageTotal">{{ Lang::get('common.Total') }} {{ @$upcomingIcoData->total() }} {{ Lang::get('common.Found') }}</div>
                                    </div>                                    
                                </div>
                                         @else
                                            <p>No record found...</p>
                                                @endif
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="tab3">
                                    <div class="head-info">
                                        @if(count(@$pastIcoData)>0)
                                        <div class="table-responsive ps ps--theme_default">
                                        <table class="table center-aligned-table">
                                            <thead>
                                                <tr class="text-primary">
                                                    <th>Logo</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>Closed Date</th>
                                                    <th>Category</th>
                                                    <th>Year</th>
                                                    <th>Website</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach(@$pastIcoData as $icoVal)
                                              <tr>
                                                <td class="logo"><a href="{{url('ico/'.str_replace(' ', '-', $icoVal['name']))}}"><img width="170" height="26" src="{{ url('/') }}/ICO/LogoImage/{{ $icoVal['logo_image'] }}" alt="Logo"></a></td>
                                                <td class="name"><a href="{{url('ico/'.str_replace(' ', '-', $icoVal['name']))}}">{{ ucwords($icoVal['name'])}}</a></td>
                                                <td class="start-date">
                                                   @php $startDate = explode(" ",$icoVal['start_time']); 
                                                    $actualStartDate = date("d M Y",strtotime($startDate[0]));
                                                    @endphp 
                                                    {{ @$actualStartDate }}                                                    
                                                </td>
                                                <td class="close-date">
                                                    @php $endDate = explode(" ",$icoVal['end_time']); 
                                                    $actualEndDate = date("d M Y",strtotime($endDate[0]));
                                                    @endphp 
                                                    {{ $actualEndDate }}
                                                </td>
                                                <td class="category">{{ ucfirst($icoVal->IcoRel['name'])}}</td>
                                                <td class="category">{{ date("Y",strtotime($startDate[0]))}}</td>
                                                <td class="website"><a href="{{ ucfirst($icoVal['website'])}}" target="_blank" class="btn btn-primary btn-sm">Visit Site</a></td>
                                                <td class="rating">N/A</td>
                                              </tr>
                                                  @endforeach
                                               
                                            </tbody>
                                        </table>
                                    <div class="panel-footer pull-right">
                                        {{ @$pastIcoData->appends($_GET)->links('vendor/pagination/default') }}
                                        <div class="pageTotal">{{ Lang::get('common.Total') }} {{ @$pastIcoData->total() }} {{ Lang::get('common.Found') }}</div>
                                    </div>
                                </div>
                                         @else
                                            <p>No record found...</p>
                                                @endif
                                    </div>
                                  </div>


                                </div>

                                  
                             </div>
                         </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Upcoming Tokens -->
        
            <!-- Section Connect with Us -->
            <div class="section section-social with-bg padding-none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <!-- Social Icons -->
                            <ul class="social-icons list-inline">
                                <li><a href="https://www.facebook.com/Weicrowd/" target="_blank" class="social-icon facebook-icon" tooltip="Facebook"></a></li>
                                <li><a href="https://twitter.com/WeiCrowd" target="_blank" class="social-icon twitter-icon" tooltip="Twitter"></a></li>
                                <li><a href="https://www.linkedin.com/company/weicrowd/" target="_blank" class="social-icon linkedin-icon" tooltip="LinkedIn"></a></li>
                                <li><a href="https://medium.com/weicrowd" target="_blank" class="social-icon medium-icon" tooltip="Medium"></a></li>
                                <li><a href="https://www.reddit.com/user/Weicrowd" target="_blank" class="social-icon reddit-icon" tooltip="Reddit"></a></li>
                            <li><a href="https://t.me/WeiCrowd" target="_blank" class="social-icon telegram-icon" tooltip="Telegram"></a></li>
                            </ul>
                            <!-- Social Icons -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Section Connect with Us -->

        <!-- Loader modal -->
    <div class="payment-load loder" style="display:none;">
        <div class="bg-lod"></div>
        <div class="loader" ></div>
    </div>   
        
@endsection

@section('css')
<style type="text/css">.text-left-li .listing-items{justify-content:left;}</style>
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
  .uploadfile-msg {
    color: blue;
    padding: 5px 10px;
    display: block;
    font-size: 12px;
}

  .loader {
 border: 8px solid #f3f3f3;
    border-radius: 50%;
    border-top: 8px solid #333;
    width: 78px;
    height: 78px;
 -webkit-animation: spin 2s linear infinite; /* Safari */
 animation: spin 2s linear infinite;
}
.payment-load.loder {
    position: fixed;
    z-index: 99999;
    left: 50%;
    top: 50%;
}

/* Safari */
@-webkit-keyframes spin {
 0% { -webkit-transform: rotate(0deg); }
 100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
 0% { transform: rotate(0deg); }
 100% { transform: rotate(360deg); }
}

.payment-load.loder:before {
    content: "";
    width: 100%;
    background: rgba(0, 0, 0, 0.6);
    height: 100%;
    position: fixed;
    left: 0;
    top: 0;
}

</style>
@endsection
@section('jscript')
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function(){localStorage.removeItem("activeTab");}, 1000*60*60);
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
    
    $("#resetFilter").on('click', function () {
        $("#datewiseCategory").select2().val('');
        $("#category_id").select2().val('');
        $.resetFilter();
    });
    
    $("#category_id").on('change', function () {
        $.getIcoList();
    });
    $("#datewiseCategory").on('change', function () {
        $.getDatewiseIcoList();
    });

    $.resetFilter = function (e) {
        $.ajax({
            type: 'POST',
            url: 'get-ico-list',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            dataType: 'JSON',
            data: {'id': $("#category_id").val(), 'type': $("#datewiseCategory").val()},
            beforeSend: function () {
                $(".loder").show();
            },
            success: function (res) {
                $(".loder").hide();
                $('#icoListDiv').show().html(res.html);
            }
        });
            $("#datewiseCategory").select2().val('');
            $("#category_id").select2().val('');
    };
    
    $.getIcoList = function (e) {
        $.ajax({
            type: 'POST',
            url: 'get-ico-list',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            dataType: 'JSON',
            data: {'id': $("#category_id").val(), 'type': $("#datewiseCategory").val()},
            beforeSend: function () {
                 $(".loder").show();
             },
            success: function (res) {
                $(".loder").hide();
                $('#icoListDiv').show().html(res.html);
            }
        });
    };

    $.getDatewiseIcoList = function (e) {
        $.ajax({
            type: 'POST',
            url: 'get-datewise-ico-list',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            dataType: 'JSON',
            data: {'type': $("#datewiseCategory").val(), 'id': $("#category_id").val()},
            beforeSend: function () {
                 $(".loder").show();
             },
            success: function (res) {
                $(".loder").hide();
                $('#icoListDiv').show().html(res.html);
            }
        });
    };
    
    // AJAX call for autocomplete 
	$("#search-box").keyup(function(){
                if($(this).val().length != '0'){
                    $.ajax({
                    type: 'POST',
                    url: 'get-ico-name',
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                    dataType: 'JSON',
                    data:'keyword='+$(this).val(),
                    beforeSend: function(){
                            //$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data){
                            $("#suggesstion-box").show();
                            $("#suggesstion-box").html(data.html);
                            //$("#search-box").css("background","#FFF");
                    }
                    });
                }else{
                    $("#suggesstion-box").hide();
                    $("#suggesstion-box").html();
                }
	});
   
</script>
@endsection
