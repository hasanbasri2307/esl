<?php

class TreatmentController extends RController
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
            return 'autocomplete_number, autocomplete_name, actionSort'; 
        } 
	public function actionView($id)
	{
		
                $model = $this->loadModel($id);
                $procedure = Procedure::model()->findByPk($id);
                $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        public function actionSort()
        {
            if (isset($_POST['items']) && is_array($_POST['items'])) {
                $i = 0;
                foreach ($_POST['items'] as $item) {
                    $project = Project::model()->findByPk($item);
                    $project->sortOrder = $i;
                    $project->save();
                    $i++;
                }
            }
        }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Treatment;
               
		if(isset($_POST['Treatment']))
		{
			$model->attributes=$_POST['Treatment'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
						
			if($model->save()){
                            
                            $this->redirect(array('view','id'=>$model->treatment_id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Treatment']))
		{
			$model->attributes=$_POST['Treatment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->treatment_id));
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
		
                 $criteria = new CDbCriteria; 
                if(isset($search)) 
                    $criteria->condition = " LOWER(`treatment_number`) LIKE LOWER('%$search%') OR LOWER(`treatment_number`) LIKE LOWER('%$search%') OR LOWER(`treatment_name`) LIKE LOWER('%$search%') OR LOWER(`treatment_name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'treatment_number'=>CSort::SORT_DESC,

                );
		
		$dataProvider=new CActiveDataProvider('Treatment', array(
                    'sort'=>$sort,
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Treatment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Treatment']))
			$model->attributes=$_GET['Treatment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Treatment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Treatment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Treatment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='treatment-form')
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
                     $criteria->condition = " LOWER(`treatment_number`) LIKE LOWER('%$search%')";
                     $treatment = Treatment::model()->findAll($criteria);
                      foreach ($treatment as $row=>$val){
                         $output[] =  array("label"=>$val->treatment_number, "value"=>$val->treatment_id,  "value2"=>$val->treatment_name);
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
                     $criteria->condition = "LOWER(`treatment_name`) LIKE LOWER('%$search%')";
                     $treatment = Treatment::model()->findAll($criteria);
                      foreach ($treatment as $row=>$val){
                         $output[] =  array("label"=>$val->treatment_name, "value"=>$val->treatment_id,  "value2"=>$val->treatment_number);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
              
        }
        public function actionProduct($id)
      {
                $model=$this->loadModel($id);
                $model_product  = TreatmentProduct::model()->findAll(array('condition'=>'treatment_id=:treatment_id','params'=>array(':treatment_id'=>$id)));
		if(isset($_POST['ProductId'])){
                         foreach($model_product as $row=>$val){
                             $product[$val->product_id] = $val->treatment_product_id;
                             if (in_array($val->product_id, $_POST['ProductId'])) {
                                    
                             }else{
                                 if(isset($q_delete)){
                                     $q_delete = " OR  id= $val->product_id";
                                 }else{
                                     $q_delete = "product_id = $val->product_id";
                                      
                                 }
                                    
                             }
                         }
                        
                          if(isset($q_delete)){
                              TreatmentProduct::model()->deleteAll("treatment_id=$id AND ($q_delete)");
                          }
                         foreach ($_POST['ProductId'] as $key=>$val){
                            //add if dont exist
                            if(isset($product[$val])){
                               
                            }else{
                               
                                 $treatment_product = new TreatmentProduct();
                                 $treatment_product->treatment_id = $id;
                                 $treatment_product->product_id = $val;
                                 $treatment_product->quantity = $_POST["ProductQuantity"][$key];
                                 $treatment_product->save();
                            }
                            
                        }
                        $this->redirect(array('treatment/view','id'=>$model->treatment_id));
                }
		$this->render('product',array(
			'model'=>$model,
                        'model_product'=>$model_product,
		));
       }
        public function actionProcedure($id)
      {
                $model=$this->loadModel($id);
               
                
                $procedure=new CActiveDataProvider('TreatmentProcedure', array(
                    'criteria'=>array('condition'=>'treatment_id=:treatment_id','params'=>array(':treatment_id'=>$id)),
                    'criteria'=>array(
                        'condition'=>'treatment_id=:treatment_id',
                        'params'=>array(':treatment_id'=>$id),
                    ),
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                
                $model_procedure  = new TreatmentProcedure;
                if(isset($_POST['TreatmentProcedure']))
		{
			$model_procedure->attributes=$_POST['TreatmentProcedure'];
                        $time = time();
                        $model_procedure->treatment_id= $id;
                        $model_procedure->user_id =Yii::app()->getModule('user')->user()->id;
                        $model_procedure->changed =$time;
                        $model_procedure->created =$time;
                        $model_procedure->active =1;
			if($model_procedure->save()){
                            
                           $this->redirect(array('treatment/procedure','id'=>$model->treatment_id));
                        }
				
		}

		 
                         
                        
               
		$this->render('procedure',array(
			'model'=>$model,
                        'model_procedure'=>$model_procedure,
                        'procedure'=>$procedure,
		));
       }
      public function actionMachine($id)
      {
                $model=$this->loadModel($id);
                $model_machine  = TreatmentMachine::model()->findAll(array('condition'=>'treatment_id=:treatment_id','params'=>array(':treatment_id'=>$id)));
		if(isset($_POST['MachineId'])){
                         foreach($model_machine as $row=>$val){
                             $machine[$val->machine_id] = $val->treatment_machine_id;
                             if (in_array($val->machine_id, $_POST['MachineId'])) {
                                    
                             }else{
                                 if(isset($q_delete)){
                                     $q_delete = " OR  id= $val->machine_id";
                                 }else{
                                     $q_delete = "machine_id = $val->machine_id";
                                      
                                 }
                                    
                             }
                         }
                         
                          if(isset($q_delete)){
                              TreatmentMachine::model()->deleteAll("treatment_id=$id AND ($q_delete)");
                          }
                         foreach ($_POST['MachineId'] as $key=>$val){
                            //add if dont exist
                            if(isset($machine[$val])){
                            }else{
                                 $treatment_machine = new TreatmentMachine();
                                 $treatment_machine->treatment_id = $id;
                                 $treatment_machine->machine_id = $val;
                                 $treatment_machine->save();
                            }
                            
                        }
                        $this->redirect(array('treatment/view','id'=>$model->treatment_id));
                }
		$this->render('machine',array(
			'model'=>$model,
                        'model_machine'=>$model_machine,
		));
       }

    public function actionPrintOutTreatmentPrice()
  {
    $this->render('report');
  }

  public function actionTreatmentPriceReport()
  {
    $branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
  
    $model = Treatment::model()->findAll();
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Treatment Price Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Treatment Price Report', "Euro Media");

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

$pdf->Write(0, 'Treatment Price', '', 0, 'C', true, 0, false, false, 0);
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
.myOtherTable th { background-color:#BDB76B;color:white;width:17%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
  <th>Treatment Code</th>
  <th>Treatment Name</th>
  <th>Type</th>
  <th>Duration</th>
  <th>Price</th>
  <th>Point</th>
 </tr>
 ';
 foreach($model as $data) {
  $tbl .='<tr>
    <td>'.$data->treatment_number.'</td>
    <td>'.$data->treatment_name.'</td>
    <td>'.$data->treatment_type.'</td>
    <td>'.$data->duration.'</td>
    <td>'.$this->rupiah($data->price).'</td>
    <td>'.$data->point.'</td>
    
    </tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Treatment Price.pdf', 'I');

  }

  private function rupiah($rp)
  {

   $jadi = "Rp " . number_format($rp,2,',','.');
   return $jadi;

  }
	   
	   
}


 