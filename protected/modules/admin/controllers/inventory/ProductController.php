<?php
require_once('excel_reader2.php');
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
                
		$this->render('view',array(
			'model'=>$model,
		));
	}

	
	public function actionCreate()
	{
		$model=new Product('create');

		

		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
                       
                       
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
                        $model->product_number = Yii::app()->getModule('inventory')->autoNumber("P","product_number","esc_product");
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
    $model->scenario ="update_inventory";
     $model_detail = ProductDetail::model()->findAll(array("condition"=>"productset_id=$id"));
		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
			if($model->save()){
                                //!!!!! script untuk update product detail belum ada
				$this->redirect(array('view','id'=>$model->product_id));
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
                $criteria->condition ="product_category=1";
               // $criteria->condition = "type = 'homecare'";
                if(isset($search))

                    $criteria->condition = "LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%')";
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

	public function actionConsumeProduct($search=NULL)
	{
                $criteria = new CDbCriteria;
                $criteria->condition ="product_category=2";
               // $criteria->condition = "type = 'homecare'";
                if(isset($search))

                    $criteria->condition = "LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%')";
		$dataProvider=new CActiveDataProvider('Product', array(
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                $this->render('consumeProduct',array(
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
				   	$branch = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                    $search = strtolower($_GET["term"]);
                    $sql = "select * from esc_product_stock inner join esc_product on esc_product.product_id = esc_product_stock.product_id where esc_product_stock.branch_id ='".$branch."' and  esc_product.product_number LIKE '%$search%' ";
					$connection=Yii::app()->db;
					$command=$connection->createCommand($sql);
					$product = $command->queryAll();
					
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val['product_number'], "value"=>$val['product_id'],  "value2"=>$val['product_name'],"stock"=>$val['quantity']);
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
                         $output[] =  array("value2"=>$val['product_name'], "value"=>$val['product_id'], "label"=>$val['product_number'] ,"stock"=>$val['quantity']);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
        }

        public function actionImport()
	   {
		$model=new Product('upload');
		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			$itu=CUploadedFile::getInstance($model,'upload');
			$path='/../upload.xls';
			$itu->saveAs($path);
			$data = new Spreadsheet_Excel_Reader($path);

			$x=0;
			$product_name=array();
			$category=array();
			
			error_reporting(E_ALL ^ E_NOTICE);
			for ($j = 2; $j <= $data->sheets[0]['numRows']; $j++) 
			{
				
				$product_name[$x]=$data->sheets[0]['cells'][$j][1];
				$category[$x]=$data->sheets[0]['cells'][$j][2];
				
				$x++;
			}
		
			for($i=0;$i<$x;$i++)
			{

				
				$model=new Product('upload');
				$model->product_name=$product_name[$i];
				$model->product_category=$category[$i];
				$model->product_number = Yii::app()->getModule('inventory')->autoNumber("P","product_number","esc_product");
				
				$model->save();
					
				
            }
                        unlink($path);
						
                        Yii::app()->user->setFlash('alert','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Success !!
										</strong>

										Product Berhasil Di import
										<br>
									</div>');
                        $this->redirect(array('import'));
						
			
		}
		$this->render('import',array('model'=>$model));
	}

	public function actionImportConsume()
	   {
		$model=new Product('upload');
		if(isset($_POST['Product']))
		{
			$model->attributes=$_POST['Product'];
			$itu=CUploadedFile::getInstance($model,'upload');
			$path='/../upload.xls';
			$itu->saveAs($path);
			$data = new Spreadsheet_Excel_Reader($path);

			$x=0;
			$product_name=array();
			$category=array();
			
			error_reporting(E_ALL ^ E_NOTICE);
			for ($j = 2; $j <= $data->sheets[0]['numRows']; $j++) 
			{
				
				$product_name[$x]=$data->sheets[0]['cells'][$j][1];
				$category[$x]=$data->sheets[0]['cells'][$j][2];
				
				$x++;
			}
		
			for($i=0;$i<$x;$i++)
			{

				
				$model=new Product('upload');
				$model->product_name=$product_name[$i];
				$model->product_category=$category[$i];
				$model->product_number = Yii::app()->getModule('inventory')->autoNumber("P","product_number","esc_product");
				
				$model->save();
					
				
            }
                        unlink($path);
						
                        Yii::app()->user->setFlash('alert','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Success !!
										</strong>

										Product Berhasil Di import
										<br>
									</div>');
                        $this->redirect(array('import'));
						
			
		}
		$this->render('importConsume',array('model'=>$model));
	}
}
