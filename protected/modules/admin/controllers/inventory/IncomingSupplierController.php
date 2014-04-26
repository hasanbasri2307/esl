<?php

class IncomingSupplierController extends RController
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
            return 'print'; 
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
						$sql = "select max(io_id) as id from esc_io order by io_id desc";
						$connection=Yii::app()->db;
						$command=$connection->createCommand($sql);
						$data = $command->queryRow();
						
						if($data['id'] ==" ")
						{
							
							$id = $data['id'] + 1;
						}
						else
						{
							$id= $data['id'];
						}
						
						$model->note = date('y').'-'.'0000'.($id+1);
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
						$model->suplier = $_POST['Io']['suplier'];
						$model->branch_id = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                        $model->status =0;
						$model->type = 'income_supplier';
                        $model->from =0;
                        $model->date =  AccountingModule::format_date($model->date);
                       
				if($model->save() && $model->validate()){
                              if(isset($_POST['ProductId'])){
                                    foreach ($_POST['ProductId'] as $key=>$val){
                                        $model_product = new IoDetail();
                                        $model_product->io_id = $model->io_id;
                                        $model_product->product_id = $val;
                                        $model_product->quantity = $_POST["ProductQuantity"][$key];
                                        $model_product->kadaluarsa = $_POST["kadaluarsa"][$key];
                                        $model_product->save();
										
										$branch = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
										$criteria=new CDbCriteria();
										$criteria->condition='branch_id=:branchID and product_id = :productID';
										$criteria->params=array(':branchID'=>$branch,':productID'=>$val);
										$ps=ProductStock::model()->find($criteria);
										
										if(count($ps) > 0)
										{
											$stok = $ps->quantity;
											$ps->quantity = $_POST["ProductQuantity"][$key] + $stok;
											$ps->save();
										}
										else
										{
											
											
											$model_stock = new ProductStock();
											$model_stock->product_id = $val;
											$model_stock->branch_id =$branch;
											$model_stock->quantity =  $_POST["ProductQuantity"][$key];
											$model_stock->save();
											
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
                if($model->status==1)
                    throw new CHttpException(404,'The requested page does not exist.');
                $model_product= IoDetail::model()->findAll(array("condition"=>"io_id=$id"));
		 
		if(isset($_POST['Io']))
		{
			$model->attributes=$_POST['Io'];
                        if($model->date_deliver !="" || $model->date_deliver >0 || $model->date_deliver!="0000-00-00"){
                            $time = time();
                            //$model->user_id =Yii::app()->getModule('user')->user()->id;
                            $model->changed =$time;
                            //$model->date =  AccountingModule::format_date($model->date);
                            if(isset($_POST['IoDetailId'])){
                                    foreach ($_POST['IoDetailId'] as $key=>$val){
                                        $model_io_detail =  IoDetail::model()->findByPk($val);
                                        if(isset($_POST['ProductQuantityDeliver'][$val])){
                                            $model_io_detail->quantity_deliver = $_POST['ProductQuantityDeliver'][$val];
                                        }else{
                                             $model_io_detail->quantity_deliver = $model_io_detail->quantity;
                                        }
                                        if( $model_io_detail->save()){
                                              $product_stock = ProductStock::model()->find(array("condition"=>"t.product_id =:product_id AND t.branch_id=:branch_id","params"=> array(':product_id' => $model_io_detail->product_id,':branch_id' => $model->to,)));
                                              if($product_stock===null){
                                                 $product_stock = new ProductStock();
                                                 $product_stock->quantity = $model_io_detail->quantity_deliver;
                                              }else{
                                                  $product_stock->quantity = $product_stock->quantity + $model_io_detail->quantity_deliver;
                                              }
                                              $product_stock->product_id = $model_io_detail->product_id;
                                              $product_stock->branch_id = $model->to;
                                              $product_stock->changed = $time;
                                              
                                        }
                                        
                                    }
                             }
                             $model->status =1;
                            if($model->save())
				$this->redirect(array('view','id'=>$model->io_id));
                        }
                       
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
				$criteria->with = array("supplier"=>array("select"=>"supplier.supplier_name")); 
				$criteria->together = true; // ADDED THIS
                $criteria->condition = " `branch_id` = $branch_id and suplier <> 0";
                $criteria->order = 'io_id ASC';
				
                if(isset($search)) 
                    $criteria->condition = " `branch_id` = $branch_id and suplier <> 0 AND LOWER(`note`) LIKE LOWER('%$search%') OR LOWER(`note`) LIKE LOWER('%$search%') OR LOWER(`supplier_name`) LIKE LOWER('%$search%') OR LOWER(`supplier_name`) LIKE LOWER('%$search%')";
                
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

	public function actionPrintOutIncoming()
	{
		$this->render('incoming_report');
	}

	public function actionIncomingPdf()
	{
		 $branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		 $sql = "SELECT *,sum(esc_io_detail.quantity) as total_qty FROM `esc_io` inner join esc_io_detail on esc_io_detail.io_id = esc_io.io_id inner join esc_supplier on esc_supplier.supplier_id = esc_io.suplier where branch_id = $branch group by esc_io.io_id";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
      
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Incoming Supplier Product Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Incoming Supplier Product Report', "Euro Media");

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

$pdf->Write(0, 'Incoming Supplier Product', '', 0, 'C', true, 0, false, false, 0);
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
.myOtherTable th { background-color:#BDB76B;color:white;width:16.5%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>No</th>
 	<th>DN-Number</th>
 	<th>Date</th>
 	<th>Description</th>
 	<th>Supplier</th>
 	<th>Total Qty</th>
 </tr>
 ';
 $no=1;
 foreach($model as $data =>$val) {
 	$tbl .='<tr>
 		<td>'.$no.'</td>
 		<td>'.$val['note'].'</td>
 		<td>'.$val['date'].'</td>
 		<td>'.$val['description'].'</td>
 		<td>'.$val['supplier_name'].'</td>
 		<td>'.$val['total_qty'].'</td>
 		</tr>';
 $no++;}
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Incoming Supplier Product.pdf', 'I');

	}
	
	
        
}
