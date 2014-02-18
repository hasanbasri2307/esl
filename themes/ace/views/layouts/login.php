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
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/font.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-skins.min.css" />
    <!--[if lte IE 8]>
      <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/ace-ie.min.css" />
    <![endif]-->
   <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css" />
</head>
<body class="login-layout">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
                                           
                                                 
                                             
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<div id="logo"> </div>
								</div>
                                                            
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									

<?php echo $content; ?>									 

									
								</div><!--/position-relative-->
							</div>
						</div>
                                                
                                           
					</div><!--/.span-->
                                         <div class="center">
                                             <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/banner.png"> 
                                         </div>
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

 

<?php
        Yii::app()->clientScript->registerCoreScript('jquery'); 
        $baseUrl = Yii::app()->theme->baseUrl; 
        $cs = Yii::app()->getClientScript();
?>
 
    <!--[if IE]>
    <?php $cs->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',CClientScript::POS_END);?>
    <![endif]-->
 
    <!--[if IE]>
    <script type="text/javascript">
     window.jQuery || document.write("<script src='<?php echo Yii::app()->theme->baseUrl;?>/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
    </script>
    <![endif]-->
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

//$cs->registerCssFile($baseUrl.'/css/yourcss.css');
?>

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>
</body>
</html>

