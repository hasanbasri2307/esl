<?php

class OutgoingController extends RController
{
	
        
	public function filters()
	{
		 return array( 
                    'rights', 
                     array('ext.activityLog.QLogFilter','logCategory'=>'Backend','logLevel'=>'action'),
             ); 
	}

	public function allowedActions() 
        { 
            return ''; 
        } 
        
	public function actionView($id)
	{
                $model = $this->loadModel($id);
                $model_product = IoDetail::model()->findAll(array("condition"=>"io_id=$id"));
		$this->render('view',array(
			'model'=>$model,
                        'model_product'=>$model_product,
		));
	}

	
	public function actionCreate()
	{
		$model=new Io;
		if(isset($_POST['Io']))
		{
			$model->attributes=$_POST['Io'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
                        $model->status =0;
						$model->type ='outcome';
                        $model->to =$_POST['Io']['to'];
                        $model->from =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
						$branch = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
						$model->branch_id = $branch;
                        $model->date =  AccountingModule::format_date($model->date);
						if($model->save()){
                                if(isset($_POST['ProductId'])){
									
                                    foreach ($_POST['ProductId'] as $key=>$val){
                                        //check product sudah ada atau belum
                                        $model_product = new IoDetail();
                                        $model_product->io_id = $model->io_id;
                                        $model_product->product_id = $val;
                                        $model_product->quantity = $_POST["ProductQuantity"][$key];
                                        $model_product->save();
                                        $ps = ProductStock::model()->find(array("condition"=>"product_id =$val AND branch_id=$branch"));
                                        if(isset($ps)){
                                            $ps->quantity=$ps->quantity - $model_product->quantity;
                                            $ps->changed=$time;
                                            $ps->save();
                                        }
										
                                    }
                                }
                            $this->redirect(array('view','id'=>$model->io_id));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $model_product= IoDetail::model()->findAll(array("condition"=>"io_id=$id"));
		
		if(isset($_POST['Io']))
		{
			$model->attributes=$_POST['Io'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->date =  AccountingModule::format_date($model->date);
			if($model->save())
				$this->redirect(array('view','id'=>$model->io_id));
		}

		$this->render('update',array(
			'model'=>$model,
                    'model_product'=>$model_product,
		));
	}

	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex($search=NULL)
	{
		
               $criteria = new CDbCriteria;
               $branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
               $criteria->condition = " `from` = $branch_id";
                if(isset($search)) 
                    $criteria->condition = " `from` = $branch_id AND LOWER(`note`) LIKE LOWER('%$search%') OR LOWER(`note`) LIKE LOWER('%$search%') ";
                
		$dataProvider=new CActiveDataProvider('Io', array(
                    
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
    public function actionPrint($id)
	{
                $this->layout='//layouts/print';
                $model = $this->loadModel($id);
                $model_product = IoDetail::model()->findAll(array("condition"=>"io_id=$id"));
		$this->render('print',array(
			'model'=>$model,
                        'model_product'=>$model_product,
		));
	}
	public function loadModel($id)
	{
		$model=Io::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='io-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPrintOutOutgoing()
	{
		$this->render('outgoing_report');
	}

	public function actionOutgoingPdf()
	{
		 $branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		 $sql = "SELECT *,sum(esc_io_detail.quantity) as total_qty_sent,sum(esc_io_detail.quantity_deliver) as total_qty_deliver FROM `esc_io` inner join esc_io_detail on esc_io_detail.io_id = esc_io.io_id inner join esc_branch on esc_branch.branch_id = esc_io.to where esc_io.from = $branch group by esc_io.io_id";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
      
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Outgoing Product Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Outgoing Product Report', "Euro Media");

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Outgoing Product', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:14.5%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>No</th>
 	<th>DN-Number</th>
 	<th>Date Sent</th>
 	<th>Date Deliver</th>
 	<th>To</th>
 	<th>Total Qty (Sent)</th>
 	<th>Total Qty (Deliver)</th>
 </tr>
 ';
 $no=1;
 foreach($model as $data =>$val) {
 	$tbl .='<tr>
 		<td>'.$no.'</td>
 		<td>'.$val['note'].'</td>
 		<td>'.$val['date'].'</td>
 		<td>'.$val['date_deliver'].'</td>
 		<td>'.$val['branch_name'].'</td>
 		<td>'.$val['total_qty_sent'].'</td>
 		<td>'.$val['total_qty_deliver'].'</td>
 		</tr>';
 $no++;}
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Outgoing Product.pdf', 'I');

	}
        
}
