@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    <!-- Content Header (Page header) --> 

    <!-- Main content -->
    <section class="content">
        <div class="flash-message"> </div>
        <br>
        <div class="ONLINE AUCTION CATEGORIES">
            <div class="container ">
                <div class="row">
                    <div class="col-md bottom30">
                        <h3>Search</h3>
                    </div>
                    <div class="faq-box">

                        <div class="panel-group" id="accordion">
                            @if(count($icoData)>0)
                            @php $i = 1; @endphp
                            @foreach($icoData as $Content)
                            <div class="links">
                                 @php $data = $Content['name'].'&nbsp;&nbsp;&nbsp;'.$Content['start_time'].'&nbsp;&nbsp;&nbsp;'.$Content['end_time']; @endphp
                                 {{ link_to_route('view_detail',$data,['ico_id'=>$Content['id']])}}
                            </div>
                            
                            @php $i++; @endphp
                            @endforeach
                            @else
                            <div class="panel panel-default">
                                <div class="panel-heading" id="headingOne" role="tab">
                                    <h4 class="panel-title"><a aria-c="" aria-expanded="true" data-parent="#accordion" data-toggle="collapse" href="#collapseOne" role="button">No Data Found</a></h4>
                                </div>

                            </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

