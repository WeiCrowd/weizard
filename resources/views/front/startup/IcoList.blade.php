@extends('layouts.dashboard')


@section('pageTitle')
Dashboard | WeiZard
@endsection

@section('content')

<!-- Dashboard Content -->
        <div class="dashboard-content">

            <div class="container">

               @include('front.common.left_menu')

                <!-- Dashboard Main -->
                <main class="dashboard-main">

                    <div class="dashboard-main-header-wrap marB30">
                        <h4 class="marB20">Manage ICO</h4>
                        <a href="{{ route('add_ico') }}" class="primary-btn dashboard-main-header-btn is-small">ADD ICO</a>
                    </div>
                    <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <div class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                    @endif
                    @endforeach
                    </div>
                    <!-- Table -->
                    <div class="widget padding-none">
                        <table class="table responsive-table has-five-col marT10">
                            <thead>
                                <tr>
                                    <th>{{ Lang::get('startup/ico.sno') }}</th>
                                    <th>{{ Lang::get('startup/ico.ico_type') }}</th>
                                    <th>{{ Lang::get('startup/ico.ico_name') }}</th>
                                    <th>{{ Lang::get('startup/ico.start_time') }}</th>
                                    <th>{{ Lang::get('startup/ico.end_time') }}</th>
                                    <th>{{ Lang::get('startup/ico.technology') }}</th>
                                    <th>{{ Lang::get('startup/ico.soft_cap') }}</th>
                                    <th>{{ Lang::get('startup/ico.status') }}</th>
                                    <th>{{ Lang::get('startup/ico.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                        @if(count(@$ico)>0)
                        @php $i = 1; @endphp
                        @foreach(@$ico as $icoData)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $icoData->ico_type =="I"?"ICO":"Pre ICO" }}</td>
                            <td>{{ $icoData->name }}</td>
                            <td>{{ $icoData->start_time }}</td>
                            <td>{{ $icoData->end_time }}</td>
                            <td>{{ $icoData->technology }}</td>
                            <td>{{ $icoData->soft_cap }}</td>
                            <td>{{ $icoData->ico_status == "1"?"Active":"Pending" }}</td>
                            <td>
                                @if($icoData->ico_status != "1")
                                <a  class="text-link theme-color" href="{{ url("startup/edit-ico/$icoData->id") }}" title="Edit">Edit</a>
                                @endif
                            </td>
                        </tr>
                         
                        @php $i++; @endphp
                        @endforeach
                        @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Table -->

                </main>
                <!-- Dashboard Main -->

            </div>
        </div>
        <!-- Dashboard Content -->
     
@endsection
