@extends('layouts.web')

@section('content')
 <!-- Body Content -->
        <div id="body-content">

            <!-- Home Banner -->
            <div class="page-banner site-banner text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="page-banner-heading">Meet Us</h1>
                            <h4 class="page-banner-subheading">(Singapore Blockchain Summit 2018)</h4>
                            <a href="{{url('/')}}" class="page-banner-link text-link">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Home Banner -->

            <!-- Section -->
            <div class="section padding-none">
<iframe class="full-width embed-form" src="https://docs.google.com/forms/d/e/1FAIpQLSdFm-lAAwSBGf29bCiOWPzeMBuIE44NKNO7qv8n8LdpsFk-gw/viewform?embedded=true" height="1280" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>  
            </div>
            <!-- Section -->

            <!-- Section Connect with Us -->
            <div class="section section-social with-bg padding-none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <!-- Social Icons -->
                            <ul class="social-icons list-inline">
                                <li><a href="#" target="_blank" class="social-icon slack-icon"></a></li>
                                <li><a href="#" target="_blank" class="social-icon github-icon"></a></li>
                                <li><a href="#" target="_blank" class="social-icon medium-icon"></a></li>
                                <li><a href="#" target="_blank" class="social-icon twitter-icon"></a></li>
                                <li><a href="#" target="_blank" class="social-icon telegram-icon"></a></li>
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

