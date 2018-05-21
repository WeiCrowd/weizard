@extends('layouts.dashboard')

@section('content')

<!-- Dashboard Content -->
        <div class="dashboard-content">
           
           <div class="container">
           
            @include('front.common.left_menu')

            <!-- Dashboard Main -->
            <main class="dashboard-main">

                <!-- Wallet Cards -->
                <ul class="row">
                    <li class="col-sm-4 marB35">
                        <div class="wallet-card">
                            <h5 class="wallet-card-heading">WeiCrowd Balance</h5>
                            <p class="wallet-card-text">24</p>
                            <div class="wallet-card-icon"><i class="weicrowd-circle-icon svg-sprite"></i></div>
                        </div>
                    </li>
                    <li class="col-sm-4 marB35">
                        <div class="wallet-card theme2">
                            <h5 class="wallet-card-heading">Ethereum Balance</h5>
                            <p class="wallet-card-text">24</p>
                            <div class="wallet-card-icon"><i class="ethereum-circle-icon svg-sprite"></i></div>
                        </div>
                    </li>
                    <li class="col-sm-4 marB35">
                        <div class="wallet-card theme3">
                            <h5 class="wallet-card-heading">Bitcoin Balance</h5>
                            <p class="wallet-card-text">24</p>
                            <div class="wallet-card-icon"><i class="bitcoin-circle-icon svg-sprite"></i></div>
                        </div>
                    </li>
                </ul>
                <!-- Wallet Cards -->

                <!-- Featured Block -->
                <div class="marB35">
                    <div class="featured-block">
                        <h3 class="featured-block-heading featured-block-item">50% <span class="small-text">Bonus</span></h3>
                        <ul class="list-inline featured-block-list featured-block-item">
                            <li>
                                <h4 class="list-heading">START DATE</h4>
                                <p class="list-text marB0">4th JAN 2018</p>
                            </li>
                            <li>
                                <h4 class="list-heading">END DATE</h4>
                                <p class="list-text marB0">10th JAN 2018</p>
                            </li>
                        </ul>
                        <div class="countdown-block theme2 featured-block-item" data-date="2018/1/25"></div>
                    </div>
                </div>
                <!-- Featured Block -->

                <!-- Bitcoin Ethereum Tabs -->
                <div class="widget tab-navigation">
                    <header class="widget-header">
                        <ul class="tab-head list-inline">
                            <li class="tab-head-item active" data-tab="#bitcoinTabPane">BITCOIN</li>
                            <li class="tab-head-item" data-tab="#ethereumTabPane">ETHEREUM</li>
                        </ul>
                    </header>
                    <div class="widget-content tab-content">

                        <!-- Bitcoin Tab Content -->
                        <div id="bitcoinTabPane" class="tab-pane active">
                            <form class="form calc-form row">
                                <div class="form-group col-sm-4" data-calc="=">
                                    <label class="form-group-label">BITCOIN</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group col-sm-4" data-calc="-">
                                    <label class="form-group-label">WEICROWD TOKEN</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="form-group-label theme-color2">50% BONUS</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="form-group-label">FINAL WEICROWD TOKEN</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input checked="" class="form-check-input" type="checkbox" />
                                                <label class="form-check-label">I have read all the terms and condition.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right text-center-xs marT30-xs">
                                            <a class="primary-btn is-slim popup-trigger" data-popup="account-summary-popup">Proceed</a>
                                            <!-- Using anchor tags for link instead of button submit tag -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Bitcoin Tab Content -->

                        <!-- ETHEREUM Tab Content -->
                        <div id="ethereumTabPane" class="tab-pane">
                            <form class="form calc-form row">
                                <div class="form-group col-sm-4" data-calc="=">
                                    <label class="form-group-label">ETH</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group col-sm-4" data-calc="-">
                                    <label class="form-group-label">WEICROWD TOKEN</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="form-group-label theme-color2">50% BONUS</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group col-sm-4">
                                    <label class="form-group-label">FINAL WEICROWD TOKEN</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input checked="" class="form-check-input" type="checkbox" />
                                                <label class="form-check-label">I have read all the terms and condition.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right text-center-xs marT30-xs">
                                            <a class="primary-btn is-slim popup-trigger" data-popup="account-summary-popup">Proceed</a>
                                            <!-- Using anchor tags for link instead of button submit tag -->
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- ETHEREUM Tab Content -->

                    </div>
                </div>
                <!-- Bitcoin Ethereum Tabs -->

            </main>
            <!-- Dashboard Main -->
            
            </div>
        </div>
        <!-- Dashboard Content -->
        
        <!-- Popups -->
        <div class="account-summary-popup site-popup fs-overlay-popup">
           <span class="site-popup-close svg-sprite"></span>
           <header class="site-popup-header uppercase medium-font">Order Summary</header>
            <ul>
            <li class="row marB30">
            <strong class="col-sm-5 marB10-xs block-element">Package Name</strong>
            <span class="col-sm-7">Gold</span>
            </li>
            <li class="row marB30">
            <strong class="col-sm-5 marB10-xs block-element">Package Method</strong>
            <span class="col-sm-7">BTC</span>
            </li>
            <li class="row marB30">
            <strong class="col-sm-5 marB10-xs block-element">Price</strong>
            <span class="col-sm-7">1 (BTC)</span>
            </li>
            <li class="row marB30">
            <strong class="col-sm-5 marB10-xs block-element">Total WeiCrowd Tokens</strong>
            <span class="col-sm-7">7500</span>
            </li>
            <li class="row marB30">
            <strong class="col-sm-5 marB10-xs block-element">Bitcoin Address </strong>
            <span class="col-sm-7"><span class="hash-wrap">18fz7jyQqhxs5L91D6PWPpWQSvxoyJ8quX</span></span>
            </li>
            </ul>
            <small class="popup-note"><span class="highlight-text">Note:</span> Please deposit your amount on above mentioned BTC address</small>
        </div>
        <!-- Popups -->
        
        <!-- FS Overlay -->
        <div class="fs-overlay"></div>
        <!-- FS Overlay -->
  
@endsection
