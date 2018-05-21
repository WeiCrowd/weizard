@extends('layouts.web')

@section('content')
 <!-- Body Content -->
        <div id="body-content">

            <!-- Home Banner -->
            <div class="page-banner site-banner text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="page-banner-heading">WeiX</h1>
                            <h4 class="page-banner-subheading">(Next Generation Exchange)</h4>
                            <a href="{{url('/')}}" class="page-banner-link text-link">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Home Banner -->

            <!-- Section -->
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="list theme2 two-columns-list big-list">
                                <li>We welcome new tokens with low capital volume</li>
                                <li>WeiX is a peer to peer crypto exchange specifically designed for new tokens.</li>
                                <li>It’s a free to trade exchange till a minimum reserve of ETH and WEIS is maintained.</li>
                                <li>It’s programmatically designed to provide instant liquidity.</li>
                                <li>You can withdraw your reserve and have the option to trade with fees.</li>
                                <li>It’s the world’s first crypto exchange - 100% liquid and Free! </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Section -->

            <!-- Section Connect with Us -->
            <div class="section section-social with-bg padding-none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <!-- Social Icons -->
                            <ul class="social-icons list-inline">
                                <li><a href="https://www.facebook.com/Weicrowd/" target="_blank" class="social-icon facebook-icon"></a></li>
                                <li><a href="https://twitter.com/WeiCrowd" target="_blank" class="social-icon twitter-icon"></a></li>
                                <li><a href="https://www.linkedin.com/company/weicrowd/" target="_blank" class="social-icon linkedin-icon"></a></li>
                                <li><a href="https://medium.com/@Weicrowd" target="_blank" class="social-icon medium-icon"></a></li>
                                <li><a href="https://www.reddit.com/user/Weicrowd" target="_blank" class="social-icon reddit-icon"></a></li>
                            </ul>
                            <!-- Social Icons -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Section Connect with Us -->

        </div>
        <!-- Body Content -->
@endsection

