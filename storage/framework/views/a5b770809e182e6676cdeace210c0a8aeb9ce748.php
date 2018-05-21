<?php $__env->startSection('content'); ?>
<div class="page-banner site-banner text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="page-banner-heading">&nbsp;</h1>
                        </div>
                    </div>
                </div>
            </div>


        <div class="wrapper row2">
  <div id="container" class="clear">
    <section id="fof" class="clear">
      <div class="fl_left">
        <h1><span>404 Error</span><strong>?</strong></h1>
      </div>
      <div class="fl_right">
        <h2>Sorry, Possible Reasons:</h2>
        <ul class="list theme2">
          <li>You may have entered wrong URL.</li>
          <li>Do not have admin access</li>
          <li>The page has been moved or deleted</li>
        </ul>
      </div>
        </section>    
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
        <style>
            #fof{display:block; width:100%; margin:80px 0 100px 0; line-height:1.6em; text-align:center;}
			#fof .fl_left{}
			#fof .fl_left h1{margin:0; padding:0; font-size:220px;}
			#fof .fl_left h1 strong{color:#35B5D6; background-color:#FFFFFF;}
			#fof .fl_left h1 span{font-size:60px;}
			#fof .fl_right{text-align:left;}
			#fof .fl_right h2{font-size:30px; text-align:left; text-transform:uppercase;color:#326FF9;}
			#fof p{display:block; margin:25px 0 0 0; padding:0; clear:both; font-size:16px;}
			#fof p a.go-back{}
			#fof p a.go-home{}
			.fl_right li{margin-bottom:20px;}
			.fl_right, .fl_left {
			  display: inline-block;
			  padding: 0 50px;
			  vertical-align: middle;
				}
        </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>