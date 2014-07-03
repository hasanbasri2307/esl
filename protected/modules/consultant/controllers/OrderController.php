<?php

class OrderController extends RController
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
		$c= $model->order_id;
		$model_detail = DetailOrder::model()->findAll(array("condition"=>"order_id=$c"));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'model_detail'=>$model_detail,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Order;

		
		if(isset($_POST['Order']))
		{
			$prefix = Yii::app()->getModule('user')->user()->profile->branch->getAttribute('branch_number');
			$model->attributes=$_POST['Order'];
			$time = time();
			$tahun = date("y");
            $model->user_id =Yii::app()->getModule('user')->user()->id;
            $model->branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'); 
            $model->changed =$time;
            $model->created =$time;
            $model->date= date("Y-m-d");
            $model->status=0;
            $model->client_id = $_POST['c_id'];

			$model->order_number = Yii::app()->getModule('consultant')->autoNumberInvoice($prefix.$tahun,"order_number","esc_order"); 
			if($model->save())
			{
				
				if(isset($_POST['ProductId'])){
									
                  	foreach ($_POST['ProductId'] as $key=>$val)
					{
                         //check product sudah ada atau belum
                         $product_detail = new DetailOrder;
                         $product_detail->order_id = $model->order_id;
                         $product_detail->product_id = $val;
                         $product_detail->qty = $_POST["ProductQuantity"][$key];
                         $product_detail->price = $_POST['ProductPrice'][$key];
                         $product_detail->save();
                                        
										
                     }
                }
				
				$this->redirect(array('view','id'=>$model->order_id));
				
				
			}
			
		}

		


		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->client_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($search=NULL)
	{
		$criteria=new CDbCriteria();
		$branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
        $criteria->condition ="branch_id=$branch_id ";
        $criteria->condition = "branch_id=$branch_id";
        if(isset($search)) 
             $criteria->condition = "branch_id=$branch_id   AND  LOWER(`order_number`) LIKE LOWER('%$search%') ";
		$count=Order::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=10;
    	$pages->applyLimit($criteria);
		$model = Order::model()->findAll($criteria);
		

		$this->render('index',array(
			'model'=>$model,
			'pages'=>$pages,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Order('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Order']))
			$model->attributes=$_GET['Order'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGetData()
	{
		
		 if (isset ($_GET['term'])){      
		//memilih noreg dari table user dimana noreg seperti      
		  $branch = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
          $search = $_GET["term"];
		  $qtxt ="select * from esc_product_stock inner join esc_product on esc_product.product_id = esc_product_stock.product_id where esc_product_stock.branch_id ='".$branch."' and  esc_product.product_name LIKE '%$search%' ";
		 $connection=Yii::app()->db;
		  $command =Yii::app()->db->createCommand($qtxt);
		 
		  $product =$command->queryAll();
		  
		  foreach ($product as $row=>$val){
                         $output[] =  array( "value"=>$val['product_name'],"value2"=>$val['product_id'],"stock"=>$val['quantity']);
                      }
		        }
		   //encode hasil dari query
		 echo CJSON::encode($output);
		 Yii::app()->end();
		 
	}

	public function actionAutocomplete_number()
      	{
         
               if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
				   	$branch = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                    $search = strtolower($_GET["term"]);
                    $sql = "select * from esc_product_stock inner join esc_product on esc_product.product_id = esc_product_stock.product_id where esc_product_stock.branch_id ='".$branch."' and  esc_product.product_number LIKE '%$search%' ";
					$connection=Yii::app()->db;
					$command=$connection->createCommand($sql);
					$product = $command->queryAll();
					
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val['product_number'], "value"=>$val['product_id'],  "value2"=>$val['product_name'],"stock"=>$val['quantity'],"price"=>$val['price']);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
            
              
              
        }
         public function actionAutocomplete_name()
      	 {
         if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
				   	$branch = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                    $search = strtolower($_GET["term"]);
                    $sql = "select * from esc_product_stock inner join esc_product on esc_product.product_id = esc_product_stock.product_id where esc_product_stock.branch_id ='".$branch."' and  esc_product.product_name LIKE '%$search%' ";
					$connection=Yii::app()->db;
					$command=$connection->createCommand($sql);
					$product = $command->queryAll();
					
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val['product_name'], "value"=>$val['product_id'], "value2"=>$val['product_number'] ,"stock"=>$val['quantity'],"price"=>$val['price']);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
        }

         public function actionPrintOrder()
	{
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT * FROM esc_product_stock inner join esc_product on esc_product.product_id = esc_product_stock.product_id where esc_product_stock.branch_id = $branch";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();

		$this->render('order_report',array(
			'model'=>$model
		));
	}

        public function actionPrintOrderDaily()
	{
		$date= $_POST['tanggal'];
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT *,sum(esc_detail_order.qty * esc_detail_order.price) as total FROM esc_order inner join esc_detail_order on esc_detail_order.order_id = esc_order.order_id inner join esc_client on esc_client.client_id = esc_order.client_id inner join esc_branch on esc_branch.branch_id = esc_order.branch_id where esc_order.branch_id = $branch and esc_order.date = '$date' group by esc_order.order_id";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Order Daily Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Order Daily Report', "Euro Media");

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

$pdf->Write(0, 'Order Daily Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $date  , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:20%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Order Number</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Date</th>
 	<th>Total</th>
 	
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['order_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['date'].'</td>
 		<td>'.Yii::app()->format->formatNumber($data['total']).'</td>
 		</tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Order Daily.pdf', 'I');

	}


	public function actionPrintOrderMonthly()
	{
		$year = $_POST['tahun'];
		$month= $_POST['bulan'];
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT *,sum(esc_detail_order.qty * esc_detail_order.price) as total FROM esc_order inner join esc_detail_order on esc_detail_order.order_id = esc_order.order_id inner join esc_client on esc_client.client_id = esc_order.client_id inner join esc_branch on esc_branch.branch_id = esc_order.branch_id where esc_order.branch_id = $branch and MONTH(esc_order.date) = '$month' and YEAR(esc_order.date) = '$year' group by esc_order.order_id";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Order Monthly Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Order Monthly Report', "Euro Media");

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

$pdf->Write(0, 'Order Monthly Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $this->bulan($month).' '.$year  , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:20%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Order Number</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Date</th>
 	<th>Total</th>
 	
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['order_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['date'].'</td>
 		<td>'.Yii::app()->format->formatNumber($data['total']).'</td>
 		</tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Order Monthly.pdf', 'I');

	}

	public function actionPrintOrderYearly()
	{
		$year = $_POST['tahun'];
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT *,sum(esc_detail_order.qty * esc_detail_order.price) as total FROM esc_order inner join esc_detail_order on esc_detail_order.order_id = esc_order.order_id inner join esc_client on esc_client.client_id = esc_order.client_id inner join esc_branch on esc_branch.branch_id = esc_order.branch_id where esc_order.branch_id = $branch and  YEAR(esc_order.date) = '$year' group by esc_order.order_id";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Order Yearly Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Order Yearly Report', "Euro Media");

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

$pdf->Write(0, 'Order Yearly Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $year  , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:20%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Order Number</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Date</th>
 	<th>Total</th>
 	
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['order_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['date'].'</td>
 		<td>'.Yii::app()->format->formatNumber($data['total']).'</td>
 		</tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Order Yearly.pdf', 'I');

	}

	public function actionPrintOrderPeriode()
	{
		$from = $_POST['dari'];
		$to = $_POST['sampai'];
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT *,sum(esc_detail_order.qty * esc_detail_order.price) as total FROM esc_order inner join esc_detail_order on esc_detail_order.order_id = esc_order.order_id inner join esc_client on esc_client.client_id = esc_order.client_id inner join esc_branch on esc_branch.branch_id = esc_order.branch_id where esc_order.branch_id = $branch and esc_order.date between '$from' and '$to' group by esc_order.order_id";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Order Periode Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Order Periode Report', "Euro Media");

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

$pdf->Write(0, 'Order Periode Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $from.' - '.$to  , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:20%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Order Number</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Date</th>
 	<th>Total</th>
 	
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['order_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['date'].'</td>
 		<td>'.Yii::app()->format->formatNumber($data['total']).'</td>
 		</tr>';
 }
 
$tbl .="</table>";


$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Order periode.pdf', 'I');

	}

	public function actionPrintOrderProduct()
	{
		$product = $_POST['product'];
		
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT *,sum(esc_detail_order.qty * esc_detail_order.price) as total FROM esc_order inner join esc_detail_order on esc_detail_order.order_id = esc_order.order_id inner join esc_client on esc_client.client_id = esc_order.client_id inner join esc_branch on esc_branch.branch_id = esc_order.branch_id where esc_order.branch_id = $branch and esc_detail_order.product_id = '$product' group by esc_order.order_id";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	

		 $sql2 = "select * from esc_product where product_id='$product'";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql2);
		 $model2 = $command->queryRow();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Order Per Product Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Order Per Product Report', "Euro Media");

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

$pdf->Write(0, 'Order Per Product Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $model2['product_name'] , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:20%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Order Number</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Date</th>
 	<th>Total</th>
 	
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['order_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['date'].'</td>
 		<td>'.Yii::app()->format->formatNumber($data['total']).'</td>
 		</tr>';
 }
 
$tbl .="</table>";


$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Order Per Product.pdf', 'I');

	}
	
}
