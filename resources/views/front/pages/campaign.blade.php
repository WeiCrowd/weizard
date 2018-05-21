@extends('layouts.web')

@section('content')
 
        <!-- Body Content -->
        <div id="body-content">

            <!-- Home Banner -->
            <div class="site-banner page-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="site-banner-text full-max-width text-center">
                                <h1 class="site-banner-heading wow fadeInDown" data-wow-duration="2s" data-wow-delay="0s">Experience the power of Crowdsale Automation</h1>
                                <a href="{{ url('/register')}}" class="primary-btn theme2-btn highlight-btn">CREATE CAMPAIGN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Home Banner -->
        </div>
        <!-- Body Content -->

        <!-- Featured Tokens -->
        <div class="section has-less-spacing with-bg padB0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="section-heading small-heading text-center">Featured Tokens</h2>
                        <ul class="listing-items has-five-items">
                            
                            @if(count(@$icoData)>0)
                            @foreach(@$icoData as $icoVal)
                                <li class="listing-box">
                                    <a href="#">
                                        <div class="listing-box-figure"><img src="{{ url('/') }}/ICO/LogoImage/{{ $icoVal->logo_image }}" alt="Image" width="50px" /></div>
                                        <h6 class="listing-box-heading">{{ $icoVal->name}} by Weis</h6>
                                        
                                        @php $startDate = explode(" ",$icoVal->start_time); 
                                        $actualStartDate = date("d M Y",strtotime(str_replace('/','-',$startDate[0])));
                                        @endphp
                                        <p class="listing-box-text">{{ @$actualStartDate }}</p>
                                    </a>
                                </li>
                            @endforeach
                            @endif
                            
<!--                            <li class="listing-box">
                                <a href="coin-page.html">
                                    <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                    <h6 class="listing-box-heading">sirin labs</h6>
                                    <p class="listing-box-text">25th December 2017</p>
                                </a>
                            </li>
                            <li class="listing-box">
                                <a href="coin-page.html">
                                    <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                    <h6 class="listing-box-heading">ankorus</h6>
                                    <p class="listing-box-text">25th December 2017</p>
                                </a>
                            </li>
                            <li class="listing-box">
                                <a href="coin-page.html">
                                    <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                    <h6 class="listing-box-heading">hoqu</h6>
                                    <p class="listing-box-text">25th December 2017</p>
                                </a>
                            </li>
                            <li class="listing-box">
                                <a href="coin-page.html">
                                    <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                    <h6 class="listing-box-heading">foodchain</h6>
                                    <p class="listing-box-text">25th December 2017</p>
                                </a>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Tokens -->

        <!-- Upcoming Tokens -->
        <div class="section has-less-spacing with-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <!-- Section Listing -->
                        <div class="section-listing">

                            <!-- Listing Filters -->
                            <div class="row listing-filters">
                                <h2 class="col-sm-5 section-heading small-heading">Upcoming Tokens</h2>
                                <div class="col-sm-7">
                                   <div class="selectbox-group">
                                    <h4 class="selectbox-group-heading">Filter By:</h4>
                                    <ul class="selectbox-group-list">
                                    <li>
                                    <select class="listing-filters-select theme-selectbox form-control">
                                    <option class="*">Industry</option>
                                    <option value=".social-media-filter">Social Media</option>
                                    <option value=".ecommerce-filter">e - Commerce</option>
                                    </select>
                                    </li>
                                    <li>
                                    <select class="listing-filters-select theme-selectbox form-control">
                                    <option class="*">Upcoming</option>
                                    <option value=".social-media-filter">Social Media</option>
                                    <option value=".ecommerce-filter">e - Commerce</option>
                                    </select>
                                    </li>
                                    </ul>
                                   </div>
                                </div>
                            </div>
                            <!-- Listing Filters -->

                            <!-- Listing Items -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="listing-items">
                                        <li class="listing-box social-media-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">amlt by coinfirm</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box ecommerce-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">sirin labs</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">Nitro</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum2-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">hoqu</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum3-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">foodchain</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum4-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">amlt by coinfirm</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box social-media-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">amlt by coinfirm</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box ecommerce-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">sirin labs</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">Nitro</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum2-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">hoqu</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum3-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">foodchain</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum4-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">amlt by coinfirm</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box social-media-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">amlt by coinfirm</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box ecommerce-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">sirin labs</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">Nitro</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum2-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">hoqu</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum3-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">foodchain</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box lorem-ipsum4-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">amlt by coinfirm</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box social-media-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">amlt by coinfirm</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                        <li class="listing-box ecommerce-filter">
                                            <a href="coin-page.html">
                                                <div class="listing-box-figure"><img src="{{ asset('content/images/listing-figure-placeholder.png') }}" alt="Image" /></div>
                                                <h6 class="listing-box-heading">sirin labs</h6>
                                                <p class="listing-box-text">25th December 2017</p>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="text-center marT40">
                                        <a href="#" class="primary-btn is-ghost-btn theme-btn highlight-btn">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Listing Items -->

                        </div>
                        <!-- Section Listing -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Upcoming Tokens -->
@endsection

