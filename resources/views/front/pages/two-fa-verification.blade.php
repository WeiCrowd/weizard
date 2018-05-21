@extends('layouts.dashboard')

@section('content')
 <!-- Dashboard Content -->
        <div class="dashboard-content">
        
        <div class="container">
             @include('front.common.left_menu')
 <!-- Dashboard Main -->
                <main class="dashboard-main">

                    <h4 class="marB20">2FA Verification</h4>

                    <!-- Account Information Tabs -->
                    <div class="widget dashboard-main-widget">
                        <h4 class="marB20">Two-Factor Authentication Verification</h4>

                        <!-- Featured Block -->
                        <div class="featured-block featured-block-2fa">
                            <h3 class="featured-block-heading featured-block-item"><span class="small-text medium-font">Enable Two Factor Authentication</span></h3>
                            <div class="featured-block-btn featured-block-item"><a data-popup="two-fa-popup" class="primary-btn is-slim popup-trigger">Enable 2FA</a></div>
                        </div>
                        <!-- Featured Block -->
                    </div>
                    <!-- Account Information Tabs -->

                </main>
                <!-- Dashboard Main -->
        
        </div>
        </div>
        <!-- Dashboard Content -->
@endsection

