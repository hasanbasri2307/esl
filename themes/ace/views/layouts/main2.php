<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from easy-themes.tk/themes/preview/ace/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 17 Jul 2013 10:36:13 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome.min.css" />
    <!--[if IE 7]>
      <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font-awesome-ie7.min.css" />
    <![endif]-->
    <!-- href="http://fonts.googleapis.com/css?family=Open+Sans:400,300"  -->
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-skins.min.css" />
    <!--[if lte IE 8]>
      <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-ie.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css" />
</head>
<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a href="#" class="brand">
                        <small>
                                <i class="icon-leaf"></i>
                                ESC
                        </small>
                </a> 
                <ul class="nav ace-nav pull-right">
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                    <img class="nav-user-photo" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/avatars/avatar2.png" alt="<?php echo    Yii::app()->getModule('user')->user()->profile->getAttribute('name');?>'s Photo" />
                                    <span class="user-info">
                                            <small>Welcome,</small>
                                            <?php echo    Yii::app()->getModule('user')->user()->profile->getAttribute('name');?>
                                    </span>

                                    <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">

                                    <li> <?php echo CHtml::link('<i class="icon-user"></i>Profile',array('/user/profile')); ?>
       
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <?php echo CHtml::link('<i class="icon-off"></i>Logout',array('/user/logout')); ?>
                                           
                                    </li>
                            </ul>
                        </li>
                </ul>
            </div> 
	</div>
    </div>
    
 
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				
                                <?php
                                     echo $this->menu;
 
                                ?>
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
                            
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<i class="icon-home home-icon"></i>
					</ul>
                                        <?php if(isset($this->breadcrumbs)):?>
                                            <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                                                    'separator'=>'<i class="icon-angle-right arrow-icon"></i>',
                                                    'links'=>$this->breadcrumbs,
                                            )); ?><!-- breadcrumbs -->
                                    <?php endif?>
					<div class="nav-search" id="nav-search">
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
					<?php echo $content; ?>
				</div><!--/.page-content-->

				
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>


    
<?php
        Yii::app()->clientScript->registerCoreScript('jquery'); 
        $baseUrl = Yii::app()->theme->baseUrl; 
        $cs = Yii::app()->getClientScript();
?>
   

<script type="text/javascript">
            if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
<!--[if lte IE 8]>
<?php $cs->registerScriptFile($baseUrl.'/assets/js/excanvas.min.js',CClientScript::POS_END);?>
<![endif]-->
<?php 

$cs->registerScriptFile($baseUrl.'/assets/js/jquery-ui-1.10.3.custom.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/jquery.ui.touch-punch.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/jquery.slimscroll.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/jquery.easy-pie-chart.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/jquery.sparkline.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/flot/jquery.flot.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/flot/jquery.flot.pie.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/flot/jquery.flot.resize.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/ace-elements.min.js',CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets/js/ace.min.js',CClientScript::POS_END);
//$cs->registerCssFile($baseUrl.'/css/yourcss.css');
?>
   
</body>
</html>

