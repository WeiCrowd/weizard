@extends('layouts.web')

@section('content')
<!-- Body Content -->
        <div id="body-content">

            <!-- Home Banner -->
            <div class="page-banner site-banner text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="page-banner-heading">WeiScrow</h1>
                            <h4 class="page-banner-subheading">(Roadmap Success Fund)</h4>
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
                                <li>It’s a decentralized escrow for the funds raised through WeiLauncher. Funds are safely stored on cold wallets.</li>
                                <li>The project timeline or roadmap is programmed into the smart contract and fund release for each milestone is   triggered based on community consensus.</li>
                                <li>In case the project fails funds are released back to the token buyers.</li>
                                <li>WeiCrowd will collect, assess and publish each milestone achieved or failed. This helps the community to form a dispute free consensus.</li>
                                <li>WeiScrow prohibits Token scams and protects token buyers from total loss in case of project failures.</li>
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

