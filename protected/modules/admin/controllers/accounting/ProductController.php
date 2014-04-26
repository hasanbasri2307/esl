<?php

class ProductController extends RController
{
	
       // public $layouts = "//layouts/main2";
	public function filters()
	{
		 return array( 
                    'rights', 
                     array('ext.activityLog.QLogFilter','logCategory'=>'Backend','logLevel'=>'action'),
             ); 
	}

	public function allowedActions() 
        { 
            return 'autocomplete_name, autocomplete_number'; 
        } 
        
	public function actionView($id)
	{
                $model = $this->loadModel($id);
                $model_detail = ProductDetail::model()->findAll(array("condition"=>"productset_id=$id"));
		$this->render('view',array(
			'model'=>$model,
                        'model_detail'=>$model_detail,
		));
	}

	
	public function actionCreate()
	{
		$model=new Product;

		

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
                        $model->division = "esc";
                       
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
			if($model->save()){
                            if($model->unitHomecare->unit_code=="set"){
                                if(isset($_POST['ProductId'])){
                                    foreach ($_POST['ProductId'] as $key=>$val){
                                        $model_detail = new ProductDetail;
                                        $model_detail->productset_id = $model->product_id;
                                        $model_detail->product_id = $val;
                                        $model_detail->quantity = $_POST["ProductQuantity"][$key];
                                        $model_detail->save();
                                    }
                                }
                            }
                            
                            $this->redirect(array('view','id'=>$model->product_id));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
    $model->scenario = 'update';
                $model_detail = ProductDetail::model()->findAll(array("condition"=>"productset_id=$id"));
		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];

                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
     if ($model->validate()) {                   
			if($model->save()){
                                //!!!!! script untuk update product detail belum ada
				$this->redirect(array('view','id'=>$model->product_id));
                        }
		}
  }

		$this->render('update',array(
			'model'=>$model,
                        'model_detail'=>$model_detail,
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
               // $criteria->condition = "type = 'homecare'";
                if(isset($search)) 
                    $criteria->condition = "  LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%')";
		$dataProvider=new CActiveDataProvider('Product', array(
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
      
	public function loadModel($id)
	{
		$model=Product::model()->find(array("condition"=>"product_id=$id"));

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
         public function actionAutocomplete_number()
      {
         
            
               if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
                    $search = strtolower($_GET["term"]);
                    $criteria = new CDbCriteria;
                    if(isset($search))   
                     $criteria->condition = " LOWER(`product_number`) LIKE LOWER('%$search%')";
                     $product = Product::model()->findAll($criteria);
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val->product_number, "value"=>$val->product_id,  "value2"=>$val->product_name);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
              
        }
         public function actionAutocomplete_name()
      {
         
            
               if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
                    $search = strtolower($_GET["term"]);
                    $criteria = new CDbCriteria;
                    if(isset($search))   
                     $criteria->condition = " LOWER(`product_name`) LIKE LOWER('%$search%')";
                     $product = Product::model()->findAll($criteria);
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val->product_name, "value"=>$val->product_id,  "value2"=>$val->product_number);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
              
        }

  public function actionPrintOutProductPrice()
  {
    $this->render('report');
  }

  public function actionProductPriceReport()
  {
    $branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
  
    $model = Product::model()->findAll();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Product Price Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Product Price Report', "Euro Media");

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

$pdf->Write(0, 'Product Price', '', 0, 'C', true, 0, false, false, 0);
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
.myOtherTable th { background-color:#BDB76B;color:white;width:25%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
  <th>Product Code</th>
  <th>Product Name</th>
  <th>Type</th>

  <th>Price</th>
 </tr>
 ';
 foreach($model as $data) {
  $tbl .='<tr>
    <td>'.$data->product_number.'</td>
    <td>'.$data->product_name.'</td>
    <td>'.$data->type.'</td>
    <td>'.$this->rupiah($data->price).'</td>
    
    </tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Product Price.pdf', 'I');

  }

  private function rupiah($rp)
  {

   $jadi = "Rp " . number_format($rp,2,',','.');
   return $jadi;

  }
}
