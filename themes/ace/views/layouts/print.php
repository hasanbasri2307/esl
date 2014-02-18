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
   
 
		<div class="main-container container-fluid">
			

		
			<div class="main-content">
                            
	

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

