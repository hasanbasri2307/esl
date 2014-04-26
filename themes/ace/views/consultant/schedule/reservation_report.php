<?php
$this->breadcrumbs=array(
	'Reservation Report',
);

$this->renderPartial('../menu',array(
			'active'=>array('7'=>true, '7.1'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
           Reservation Report 
           
    </h1>
</div>


 <div class="row-fluid">
	<div class="span12">
   <div class="row-fluid">
                <div class="span12 widget-container-span">
                  <div class="widget-box">
                    <div class="widget-header">
                      <h5 class="smaller">Reservation Report</h5>

                      <div class="widget-toolbar no-border">
                        <ul class="nav nav-tabs" id="myTab">
                          <li class="active">
                            <a data-toggle="tab" href="#home">Daily</a>
                          </li>

                          <li>
                            <a data-toggle="tab" href="#profile">Monthly</a>
                          </li>

                          <li>
                            <a data-toggle="tab" href="#info">Yearly</a>
                          </li>
                          <li>
                            <a data-toggle="tab" href="#cc">Periode</a>
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="widget-body">
                      <div class="widget-main padding-6">
                        <div class="tab-content">
                          <div id="home" class="tab-pane in active">
                           <form class="form-horizontal" method="POST" action="<?php echo Yii::app()->createUrl('consultant/schedule/printDaily');?>">
                              <div class="row-fluid">
                                <label for="id-date-picker-1">Date :</label>
                              </div>
                              <div class="control-group">
                                <div class="row-fluid input-append">
                                  <input class="span3 date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="tanggal" />
                                  <span class="add-on">
                                    <i class="icon-calendar"></i>
                                  </span>
                                </div>
                              </div>
                              <div class="form-actions">
                                <button class="btn btn-info" type="submit">
                                  <i class="icon-ok bigger-110"></i>
                                  Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                  <i class="icon-undo bigger-110"></i>
                                  Reset
                                </button>
                              </div>
                            </form>
                          </div>

                          <div id="profile" class="tab-pane">
                             <form class="form-horizontal" method="POST" action="<?php echo Yii::app()->createUrl('consultant/schedule/printMonthly');?>">
                              <div class="row-fluid">
                               <label for="form-field-select-3">Month :</label>

                            <select  id="form-field-select-3" name="bulan">
                              <option value=""></option>
                              <option value="1">January</option>
                              <option value="2">February</option>
                              <option value="3">March</option>
                              <option value="4">April</option>
                              <option value="5">May</option>
                              <option value="6">June</option>
                              <option value="7">July</option>
                              <option value="8">August</option>
                              <option value="9">September</option>
                              <option value="10">October</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                              
                            </select>
                          </div>
                          <br />
                          <div class="row-fluid">
                               <label for="form-field-select-3">Year :</label>

                            <select  id="form-field-select-3" name="tahun">
                              <option value=""></option>
                              <?php
                                $tahun_sekarang = "2014";
                                for($i=$tahun_sekarang;$i<=date("Y");$i++)
                                {
                                  ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                }
                                ?>
                              
                            </select>
                          </div>
                              <div class="form-actions">
                                <button class="btn btn-info" type="submit">
                                  <i class="icon-ok bigger-110"></i>
                                  Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                  <i class="icon-undo bigger-110"></i>
                                  Reset
                                </button>
                              </div>
                            </form>
                          </div>

                          <div id="info" class="tab-pane">
                           <form class="form-horizontal" method="POST" action="<?php echo Yii::app()->createUrl('consultant/schedule/printYearly');?>">
                            <div class="row-fluid">
                               <label for="form-field-select-3">Year :</label>

                            <select  id="form-field-select-3" name="tahun">
                              <option value=""></option>
                              <?php
                                $tahun_sekarang = "2014";
                                for($i=$tahun_sekarang;$i<=date("Y");$i++)
                                {
                                  ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                }
                                ?>
                              
                            </select>
                          </div>
                              <div class="form-actions">
                                <button class="btn btn-info" type="submit">
                                  <i class="icon-ok bigger-110"></i>
                                  Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                  <i class="icon-undo bigger-110"></i>
                                  Reset
                                </button>
                              </div>
                            </form>
                          </div>
                          <div id="cc" class="tab-pane">
                             <form class="form-horizontal" method="POST" action="<?php echo Yii::app()->createUrl('consultant/schedule/printPeriode');?>">
                               <div class="row-fluid">
                                <label for="id-date-picker-1">From :</label>
                              </div>
                              <div class="control-group">
                                <div class="row-fluid input-append">
                                  <input class="span3 date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="dari" />
                                  <span class="add-on">
                                    <i class="icon-calendar"></i>
                                  </span>
                                </div>
                              </div>
                               <div class="row-fluid">
                                <label for="id-date-picker-1">To :</label>
                              </div>
                              <div class="control-group">
                                <div class="row-fluid input-append">
                                  <input class="span3 date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="sampai" />
                                  <span class="add-on">
                                    <i class="icon-calendar"></i>
                                  </span>
                                </div>
                              </div>
                              <div class="form-actions">
                                <button class="btn btn-info" type="submit">
                                  <i class="icon-ok bigger-110"></i>
                                  Submit
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                  <i class="icon-undo bigger-110"></i>
                                  Reset
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
   
         

 
 
    </div>
</div>

<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/inventory/product/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 
</script>

