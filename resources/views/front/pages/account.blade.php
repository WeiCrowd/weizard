@extends('layouts.dashboard')

@section('content')
 <!-- Dashboard Content -->
        <div class="dashboard-content">
        
        <div class="container">
             @include('front.common.left_menu')
 <!-- Dashboard Main -->
        <main class="dashboard-main">
           
           <h4 class="marB20">Account Information</h4>
           
            <!-- Account Information Tabs -->
            <div class="widget dashboard-main-widget tab-navigation is-responsive">
                <header class="widget-header">
                    <ul class="tab-head list-inline">
                        <li class="tab-head-item active" data-tab="#accInformationTabPane">ACCOUNT INFORMATION</li>
                        <li class="tab-head-item" data-tab="#paymentAddressTabPane">PAYMENT ADDRESS</li>
                        <li class="tab-head-item" data-tab="#ethereumAddressTabPane">ETHEREUM ADDRESS</li>
                        <li class="tab-head-item" data-tab="#changePasswordTabPane">CHANGE PASSWORD</li>
                    </ul>
                </header>
                <div class="widget-content tab-content">

                    <!-- Account Information Tab Content -->
                    <div id="accInformationTabPane" class="tab-pane active">
                        <form class="form row">
                            <div class="form-group col-sm-4">
                                <label class="form-group-label">First Name</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-group-label">Last Name</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-group-label">Address Line 1</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-group-label">Address Line 2</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-group-label">Country</label>
                                <select class="listing-filters-select theme-selectbox form-control">
                                    <option>Select</option>
                                    <option>India</option>
                                    <option>USA</option>
                                    </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-group-label">City</label>
                                <select class="listing-filters-select theme-selectbox form-control">
                                    <option>Select</option>
                                    <option>Delhi</option>
                                    <option>Mumbai</option>
                                    </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-group-label">Pin Code</label>
                                <input type="tel" class="form-control" />
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="form-group-label">Email Address</label>
                                <input type="email" class="form-control" />
                            </div>
                            <div class="form-group col-sm-12 text-right text-center-xs marT30-xs">
                                <a href="#" class="primary-btn is-slim">Update Account</a>
                                <!-- Using anchor tags for link instead of button submit tag -->
                            </div>
                        </form>
                    </div>
                    <!-- Account Information Tab Content -->

                    <!-- Payment Address Tab Content -->
                    <div id="paymentAddressTabPane" class="tab-pane">
                        <form class="form">
                            <div class="form-group">
                                <label class="form-group-label">Bitcoin Address</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="form-group-label">Ethereum Address</label>
                                <input type="text" class="form-control" />
                                <p class="theme-color2 marT10 marB80 marB0-xs">*Note: Tokens are compatible with some Ethereum wallets only. You cannot use an address from a Cryptocurrency exchange.</p>
                            </div>
                            <div class="form-group text-right text-center-xs marT30-xs">
                                <a href="#" class="primary-btn is-slim">Save</a>
                                <!-- Using anchor tags for link instead of button submit tag -->
                            </div>
                        </form>
                    </div>
                    <!-- Payment Address Tab Content -->
                    
                    <!-- Ethereum Address Tab Content -->
                    <div id="ethereumAddressTabPane" class="tab-pane">
                        <form class="form">
                            <div class="form-group">
                                <label class="form-group-label">Admin Ethereum Address</label>
                                <input type="text" class="form-control" />
                            </div>
                            <div class="form-group text-right text-center-xs marT30-xs">
                                <a href="#" class="primary-btn is-slim">Save</a>
                                <!-- Using anchor tags for link instead of button submit tag -->
                            </div>
                        </form>
                    </div>
                    <!-- Ethereum Address Tab Content -->
                    
                    <!-- Change Password Tab Content -->
                    <div id="changePasswordTabPane" class="tab-pane">
                        <form class="form">
                            <div class="form-group">
                                <label class="form-group-label">Current Password</label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="form-group-label">New Password</label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label class="form-group-label">Confirm Password</label>
                                <input type="password" class="form-control" />
                            </div>
                            <div class="form-group text-right text-center-xs marT30-xs">
                                <a href="#" class="primary-btn is-slim">Update Password</a>
                                <!-- Using anchor tags for link instead of button submit tag -->
                            </div>
                        </form>
                    </div>
                    <!-- Change Password Tab Content -->

                </div>
            </div>
            <!-- Account Information Tabs -->

        </main>
        <!-- Dashboard Main -->
        
        </div>
        </div>
        <!-- Dashboard Content -->
@endsection

