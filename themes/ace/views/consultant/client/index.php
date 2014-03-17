<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Client',
);
$this->renderPartial('../menu',array(
			'active'=>array('2'=>true, '2.1'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Clients  
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
            <?php
          
		 $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Import',
                'url'=>array('import'),
        ));

 ?>
    </h1>
</div>
    
 <div class="row-fluid">
 
                                <div class="span12 infobox-container">
                                
                                <?php
                                foreach ($client as $item ) {
                                    ?>
                                
                                    <div class="infobox infobox-blue2  ">
                                        <div class="infobox-progress">
                                            <div class="easy-pie-chart percentage" data-percent="90" data-size="90">
                                                <a href="<?php echo Yii::app()->createUrl('consultant/client/view', array('id'=>$item->client_id));?>"><?php if($item->pict == NULL) { echo CHtml::image(Yii::app()->request->baseUrl.'/upload/client/test.jpg',"image",array("class"=>"pict")) ; } else { echo CHtml::image(Yii::app()->request->baseUrl.'/upload/client/'.$item->pict,"image",array("class"=>"pict")) ;} ?></a>
                                            </div>
                                        </div>

                                        <div class="infobox-data">
                                            <span class="infobox-text"></span>

                                            <div class="infobox-content">
                                                <span class="bigger-110">~</span>
                                                ID&nbsp &nbsp &nbsp &nbsp&nbsp&nbsp &nbsp : <?php echo CHtml::link($item->client_number,array('client/view','id'=>$item->client_id)); ?>
                                            </div>
                                            <div class="infobox-content">
                                                <span class="bigger-110">~</span>
                                                Nama&nbsp &nbsp : <?php echo $item->client_name;?>
                                            </div>
                                             <div class="infobox-content">
                                                <span class="bigger-110">~</span>
                                                HP 1&nbsp &nbsp &nbsp &nbsp: <?php echo $item->hp1;?>
                                            </div>
                                             <div class="infobox-content">
                                                <span class="bigger-110">~</span>
                                                Kantor&nbsp &nbsp: <?php echo $item->phone_kantor;?>
                                            </div>
                                             <div class="infobox-content">
                                                <span class="bigger-110">~</span>
                                                Email&nbsp&nbsp &nbsp &nbsp: <?php echo $item->email;?>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <?php } ?>

                                    <div class="space-6"></div>

                                    
                                </div>

                                <div class="vspace"></div>

                                
                            </div><!--/row-->
                            <div class="pagination">     <?php     $this->widget('CLinkPager', array(         'pages' => $pages,         'header' => '',         'nextPageLabel' => 'Next',         'prevPageLabel' => 'Prev',         'selectedPageCssClass' => 'active',         'hiddenPageCssClass' => 'disabled',         'htmlOptions' => array(             'class' => '',         )     ))     ?> </div> 

                            <div class="hr hr32 hr-dotted"></div>

                            

                            <!--PAGE CONTENT ENDS-->
                        </div><!--/.span-->
                    </div><!--/.row-fluid-->
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/consultant/client/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>


