<div class="row">
                    <div class="col-xs-12">
                         <div class="card">
                             <div class="card-body">
                                <ul class="nav nav-tabs">
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