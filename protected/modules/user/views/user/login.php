 <div id="login-box" class="login-box visible widget-box no-border">
        <div class="widget-body">
        <div class="widget-main">
                <h4 class="header blue lighter bigger">
                        <i class="icon-coffee green"></i>
                        Please Enter Your Information
                </h4>

                <div class="space-6"> </div>
                <?php /** @var BootActiveForm $form */
                $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id'=>'horizontalForm',
                    'type'=>'inline',
                    
                )); ?>

                   <?php echo $form->textFieldRow($model, 'username', array('class'=>'span12','placeholder'=>'Username')); ?>
                   <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span12','placeholder'=>'Password')); ?>
                  <?php //echo $form->checkBoxListRow($model, 'rememberMe'); ?>
                <?php echo $form->checkboxRow($model, 'rememberMe'); ?>
                  <div class="form-actions nobackgroud">
                      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login', 'htmlOptions'=>array('class'=>'width-35 pull-right btn btn-small btn-primary','append'=>'<i class="icon-key"></i>'))); ?>
                  </div>
                    
                 <?php $this->endWidget(); ?> 
                 

                <?php
                $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
                $this->breadcrumbs=array(
                        UserModule::t("Login"),
                );
                ?>
  

        </div><!--/widget-main-->

        <div class="toolbar clearfix">
            &nbsp;
        </div>
    </div><!--/widget-body-->
</div><!--/login-box-->



