<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice</title>
	<link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/print/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/print/print.css' media="print" />

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
            <div id="logo">
              <img id="image" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both">&nbsp;</div>
		<?php echo $content;?>
		
		
	
	</div>
	
</body>

</html>