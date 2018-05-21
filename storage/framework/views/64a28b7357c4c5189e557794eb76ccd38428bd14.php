<?php $__env->startSection('head_icon'); ?>
pe-7s-world
<?php $__env->stopSection(); ?>

<?php $__env->startSection('heading'); ?>
<?php echo e(Lang::get('common.Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sub_heading'); ?>
<?php echo e(Lang::get('common.Sub_Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(Auth::user()->user_type == 'A'): ?>
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <div class="panel panel-default">
            <div class="panel-heading">Two-Factor Authentication</div>

            <div class="panel-body">
                <?php if(Auth::user()->google2fa_secret): ?>
                <a href="<?php echo e(url('2fa/disable')); ?>" class="btn btn-warning">Disable 2FA</a>
                <?php else: ?>
                <a href="<?php echo e(url('2fa/enable')); ?>" class="btn btn-primary">Enable 2FA</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>   


<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">206</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +28%</span></h2>
                    <div class="small">% New Sessions</div>
                    <div class="sparkline1 text-center"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">321</span> <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +10%</span> </h2>
                    <div class="small">Total visitors</div>
                    <div class="sparkline2 text-center"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">789</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +29%</span></h2>
                    <div class="small">Total users</div>
                    <div class="sparkline3 text-center"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
        <div class="panel panel-bd">
            <div class="panel-body">
                <div class="statistic-box">
                    <h2><span class="count-number">171</span><span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> +24%</span></h2>
                    <div class="small">Bounce Rate</div>
                    <div class="sparkline4 text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="row">
    
    
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 ">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Top 5 countries Azimuth users</h4>
                </div>
            </div>
            <div class="panel-body">
                <div id="map1"></div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        <div class="panel panel-bd lobidisable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Messages</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="message_inner">
                    <div class="message_widgets">
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Naeem Khan</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status available pull-right"></span>
                            </div>
                        </a> 
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar2.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Sala Uddin</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status away pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar3.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Mozammel Hoque</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status busy pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar4.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Tanzil Ahmed</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status offline pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar5.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Amir Khan</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status available pull-right"></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="inbox-item">
                                <div class="inbox-item-img"><img src="assets/dist/img/avatar.png" class="img-circle" alt=""></div>
                                <strong class="inbox-item-author">Salman Khan</strong>
                                <span class="inbox-item-date">-13:40 PM</span>
                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                <span class="profile-status available pull-right"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        <div class="panel panel-bd lobidisable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Recent Activities</h4>
                </div>
            </div>
            <div class="panel-body">
                <ul class="activity-list list-unstyled">
                    <li class="activity-purple">
                        <small class="text-muted">9 minutes ago</small>
                        <p>You <span class="label label-success label-pill">recommended</span> Karen Ortega</p>
                    </li>
                    <li class="activity-danger">
                        <small class="text-muted">15 minutes ago</small>
                        <p>You followed Olivia Williamson</p>
                    </li>
                    <li class="activity-warning">
                        <small class="text-muted">22 minutes ago</small>
                        <p>You <span class="text-danger">subscribed</span> to Harold Fuller</p>
                    </li>
                    <li class="activity-primary">
                        <small class="text-muted">30 minutes ago</small>
                        <p>You updated your profile picture</p>
                    </li>
                    <li>
                        <small class="text-muted">35 minutes ago</small>
                        <p>You deleted homepage.psd</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        <div class="panel panel-bd lobidisable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Chat</h4>
                </div>
            </div>
            <div class="panel-body">
                <ul class="chat_list">
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="assets/dist/img/avatar.png" alt="male">
                            <i>10:00</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>John Deo</i>
                                <p>Hello! ✋</p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="assets/dist/img/avatar.png" alt="Female">
                            <i>10:01</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Marco Lopes</i>
                                <p>Hi, How are you?☺ What about our next meeting?😼</p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="assets/dist/img/avatar.png" alt="male">
                            <i>10:01</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>John Deo</i>
                                <p>Yeah everything is fine 👍</p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="assets/dist/img/avatar.png" alt="male">
                            <i>10:02</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Marco Lopes</i>
                                <p>Wow that's great 👏</p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="chat-avatar">
                            <img src="assets/dist/img/avatar.png" alt="male">
                            <i>10:01</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>John Deo</i>
                                <p>What can you do with HTML VIEWER ?</p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="assets/dist/img/avatar.png" alt="male">
                            <i>10:02</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Marco Lopes</i>
                                <p>It helps to beautify/format your HTML.</p>
                            </div>
                        </div>
                    </li>
                    <li class="clearfix odd">
                        <div class="chat-avatar">
                            <img src="assets/dist/img/avatar.png" alt="male">
                            <i>10:02</i>
                        </div>
                        <div class="conversation-text">
                            <div class="ctext-wrap">
                                <i>Marco Lopes</i>
                                <p>It helps to save and share HTML content and show the HTML output</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="panel-footer">
                <div class="input-group">
                    <input type="text" class="form-control emojionearea" placeholder="Your Message. . . ">
                    <span class="input-group-btn">
                        <button class="btn btn-success" type="button">Send</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
        <div class="panel panel-bd lobidisable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Calender</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="monthly_calender">
                    <div class="monthly" id="m_calendar"></div>
                </div>
            </div>
            <div class="panel-footer">
                This is standard panel footer 
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Contacts</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table  class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Street Address</th>
                                <th>% Share</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Naeem Khan</td>
                                <td>123 456 7890</td>
                                <td>294-318 Duis Ave</td>
                                <td><div class="sparkline5"></div> </td>
                                <td>Noakhali</td>
                                <td><a href="#" class="btn btn-success btn-xs">View</a></td>
                            </tr>
                            <tr>
                                <td>Tuhin Sarkar</td>
                                <td>123 456 7890</td>
                                <td>680-1097 Mi Rd.</td>
                                <td><div class="sparkline6"></div></td>
                                <td>Lavoir</td>
                                <td><a href="#" class="btn btn-success btn-xs active">View</a></td>
                            </tr>
                            <tr>
                                <td>Tanjil Ahmed</td>
                                <td>456 789 1230</td>
                                <td>Ap #289-8161 In Avenue</td>
                                <td><div class="sparkline7"></div></td>
                                <td>Dhaka</td>
                                <td><a href="#" class="btn btn-success btn-xs">View</a></td>
                            </tr>
                            <tr>
                                <td>Sourav</td>
                                <td>789 123 4560</td>
                                <td>226-4861 Augue. St.</td>
                                <td><div class="sparkline8"></div></td>
                                <td>Rongpur</td>
                                <td><a href="#" class="btn btn-success btn-xs">View</a></td>
                            </tr>
                            <tr>
                                <td>Jahangir Alam</td>
                                <td>(01662) 59083</td>
                                <td>3219 Elit Avenue</td>
                                <td><div class="sparkline9"></div></td>
                                <td>Chittagong</td>
                                <td><a href="#" class="btn btn-success btn-xs">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-4 hidden-sm hidden-md">
        <div class="social-widget">
            <ul>
                <li>
                    <div class="fb_inner">
                        <i class="fa fa-facebook"></i>
                        <span class="sc-num">5,791</span>
                        <small>Fans</small>
                    </div>
                </li>
                <li>
                    <div class="twitter_inner">
                        <i class="fa fa-twitter"></i>
                        <span class="sc-num">691</span>
                        <small>Followers</small>
                    </div>
                </li>
                <li>
                    <div class="g_plus_inner">
                        <i class="fa fa-google-plus"></i>
                        <span class="sc-num">147</span>
                        <small>Followers</small>
                    </div>
                </li>
                <li>
                    <div class="dribble_inner">
                        <i class="fa fa-dribbble"></i>
                        <span class="sc-num">3,485</span>
                        <small>Followers</small>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<style>

    .dashboard-detail ul {
  margin: 0;
  text-align: center;
}
.dashboard-detail li {
    background: #f5f5f5 none repeat scroll 0 0;
    box-shadow: 0 2px 4px #999;
    display: inline-block;
    margin: 0 9px 45px;
    position: relative;
    text-align: center;
    vertical-align: top;
    width: 220px;
}
.dashboard-detail a::before {
  background-image: url("../images/sprit.png");
  background-position: -8px -359px;
  content: "";
  height: 58px;
  left: 17px;
  position: absolute;
  top: 13px;
  width: 76px;
}

.dashboard-detail li.General a::before {
  background-position: -8px -359px;
}
.dashboard-detail a {
    color: #222;
    display: inline-block;
    font-size: 16px;
    padding: 21px 0 20px 44px;
    text-decoration: none;
}
    </style>

<link href="<?php echo e(asset('assets/plugins/toastr/toastr.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('assets/plugins/emojionearea/emojionearea.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(asset('assets/plugins/monthly/monthly.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscript'); ?>
<script src="<?php echo e(asset('assets/plugins/toastr/toastr.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/sparkline/sparkline.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/datamaps/d3.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/datamaps/topojson.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/datamaps/datamaps.all.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/counterup/waypoints.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/counterup/jquery.counterup.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/emojionearea/emojionearea.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/monthly/monthly.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/dist/js/dashboard.js')); ?>" type="text/javascript"></script>

<script>
$(document).ready(function () {

    "use strict";
    $('.count-number').counterUp({
        delay: 10,
        time: 5000
    });

    var basic_choropleth = new Datamap({
        element: document.getElementById("map1"),
        projection: 'mercator',
        fills: {
            defaultFill: "#37a000",
            authorHasTraveledTo: "#fa0fa0"
        },
        data: {
            USA: {fillKey: "authorHasTraveledTo"},
            JPN: {fillKey: "authorHasTraveledTo"},
            ITA: {fillKey: "authorHasTraveledTo"},
            CRI: {fillKey: "authorHasTraveledTo"},
            KOR: {fillKey: "authorHasTraveledTo"},
            DEU: {fillKey: "authorHasTraveledTo"}
        }
    });

    var colors = d3.scale.category10();

    window.setInterval(function () {
        basic_choropleth.updateChoropleth({
            USA: colors(Math.random() * 10),
            RUS: colors(Math.random() * 100),
            AUS: {fillKey: 'authorHasTraveledTo'},
            BRA: colors(Math.random() * 50),
            CAN: colors(Math.random() * 50),
            ZAF: colors(Math.random() * 50),
            IND: colors(Math.random() * 50)
        });
    }, 2000);

    $('.chat_list').slimScroll({
        size: '3px',
        height: '305px'
    });

    $('.message_inner').slimScroll({
        size: '3px',
        height: '320px'
    });

    $(".emojionearea").emojioneArea({
        pickerPosition: "top",
        tonesStyle: "radio"
    });

    $('#m_calendar').monthly({
        mode: 'event',
        xmlUrl: 'events.xml'
    });

    $('.sparkline1').sparkline([4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 4, 6, 7, 7, 4, 3, 2, 4, 6, 7, 7, 4, 3, 1, 5, 7, 6, 6, 5, 5, 4, 4, 3, 3, 4, 4, 5], {
        type: 'bar',
        barColor: '#37a000',
        height: '35',
        barWidth: '3',
        barSpacing: 2
    });

    $(".sparkline2").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {
        type: 'line',
        height: '35',
        width: '100%',
        lineColor: '#37a000',
        fillColor: '#fff'
    });

    $(".sparkline3").sparkline([2, 5, 3, 7, 5, 10, 3, 6, 5, 7], {
        type: 'line',
        height: '35',
        width: '100%',
        lineColor: '#37a000',
        fillColor: '#fff'
    });

    $(".sparkline4").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
        type: 'line',
        height: '35',
        width: '100%',
        lineColor: '#37a000',
        fillColor: 'rgba(55, 160, 0, 0.7)'
    });

    $(".sparkline5").sparkline([4, 2], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

    $(".sparkline6").sparkline([3, 2], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

    $(".sparkline7").sparkline([4, 1], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

    $(".sparkline8").sparkline([1, 3], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

    $(".sparkline9").sparkline([3, 5], {
        type: 'pie',
        sliceColors: ['#37a000', '#2c3136']
    });

});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>