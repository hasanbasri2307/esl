<?php

class ProductpackageController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public function filters()
	{
		 return array( 
                    'rights', 
                     array('ext.activityLog.QLogFilter','logCategory'=>'Backend','logLevel'=>'action'),
             ); 
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$model = $this->loadModel($id);
        $model_product = ProductpackageDetail::model()->findAll(array("condition"=>"productpackage_id=$id"));
		$this->render('view',array(
			'model'=>$model,
            'model_product'=>$model_product,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Productpackage;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Productpackage']))
		{
			$model->attributes=$_POST['Productpackage'];
			$time = time();
            $model->user_id =Yii::app()->getModule('user')->user()->id;
            $model->changed =$time;
            $model->created =$time;
			$model->productpackage_number =Yii::app()->getModule('inventory')->autoNumber("PP","productpackage_number","esc_productpackage");
			if($model->save())
			{
				if(isset($_POST['ProductId'])){
									
                  	foreach ($_POST['ProductId'] as $key=>$val)
					{
                         //check product sudah ada atau belum
                         $product_detail = new ProductpackageDetail();
                         $product_detail->productpackage_id = $model->productpackage_id;
                         $product_detail->product_id = $val;
                         $product_detail->quantity = $_POST["ProductQuantity"][$key];
                         $product_detail->save();
                                        
										
                     }
                }
				
				$this->redirect(array('view','id'=>$model->productpackage_id));
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
		$model->scenario = 'accounting';
		$model_product = ProductpackageDetail::model()->findAll(array("condition"=>"productpackage_id=$id"));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Productpackage']))
		{
			$model->attributes=$_POST['Productpackage'];
			if($model->save())
			{
				if(isset($_POST['ProductId'])){
									
                  	foreach ($_POST['ProductId'] as $key=>$val)
					{
						
                         //check product sudah ada atau belum
						
						 if(isset($_POST['p_id'][$key]))
						 {
							 
							 $cek  = ProductpackageDetail::model()->findAll(array("condition"=>"productpackage_id=".$_POST['p_id'][$key]." and product_id=$val"));
							 if(count($cek) > 0)
							 {
								 
								 $product_detail = ProductpackageDetail::model()->findByPk($_POST["id"][$key]);
								 $product_detail->product_id = $val;
								 $product_detail->quantity = $_POST["ProductQuantity"][$key];
								 $product_detail->save();
							 }
						 }
						 else
						 {
							 $product_detail = new ProductpackageDetail();
							 $product_detail->productpackage_id = $model->productpackage_id;
							 $product_detail->product_id = $val;
							 $product_detail->quantity = $_POST["ProductQuantity"][$key];
							 $product_detail->save();
						 }
						 
                                        
								
                     }
                }
				$this->redirect(array('view','id'=>$model->productpackage_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model_product'=>$model_product,
		));
	}
	
	public function actionDeleteItem()
	{
		$id = $_POST['id'];
		$product = ProductpackageDetail::model()->findByPk($id);
		$product->delete();
		echo $id;
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		
		$this->loadModel($id)->delete();
		$model_product = ProductpackageDetail::model()->findAll(array("condition"=>"productpackage_id=$id"));
		foreach($model_product as $val)
		{
			$val->delete();
		}
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	
	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Productpackage');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Productpackage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Productpackage']))
			$model->attributes=$_GET['Productpackage'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Productpackage the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Productpackage::model()->findByPk($id);
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Productpackage $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='productpackage-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	  public function actionPrintOutProductPackagePrice()
  {
    $this->render('report');
  }

  public function actionProductPackagePriceReport()
  {
    $branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
  
    $model = ProductPackage::model()->findAll();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Product Package Price Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Product Package Price Report', "Euro Media");

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

$pdf->Write(0, 'Product Package Price', '', 0, 'C', true, 0, false, false, 0);
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
.myOtherTable th { background-color:#BDB76B;color:white;width:20%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
  <th>Product Package Code</th>
  <th>Product Package Name</th>
  <th>Price</th>
  <th>Discount (Rp)</th>
  <th>Discount (%)</th>
 </tr>
 ';
 foreach($model as $data) {
  $tbl .='<tr>
    <td>'.$data->productpackage_number.'</td>
    <td>'.$data->productpackage_name.'</td>
    <td>Rp '.$data->price.'</td>
    <td>'.$data->discount_rp.'</td>
    <td>'.$data->discount_percent.'</td>
    
    </tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Product Package Price.pdf', 'I');

  }

  private function rupiah($rp)
  {

   $jadi = "Rp " .number_format($rp,2,',');
   return $jadi;

  }
	
	
	
	
}
