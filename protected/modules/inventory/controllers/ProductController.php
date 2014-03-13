<?php

class ProductController extends RController
{
	
       // public $layouts = "//layouts/main2";
	public function filters()
	{
		 return array( 
                    'rights', 
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

	public function actionStock($search=NULL)
	{
				$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                $criteria = new CDbCriteria;
                
                $criteria->condition = 'branch_id=:id';
				$criteria->params = array(':id'=>$branch);
               // $criteria->condition = "type = 'homecare'";
                if(isset($search)) 
                    $criteria->condition = "LOWER(`product.product_number`) LIKE LOWER('%$search%') OR LOWER(`product.product_number`) LIKE LOWER('%$search%') OR LOWER(`product.product_name`) LIKE LOWER('%$search%') OR LOWER(`product.product_name`) LIKE LOWER('%$search%')";
		$dataProvider=new CActiveDataProvider('ProductStock', array(
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                $this->render('stock',array(
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
                    $criteria = new CDbCriteria;
					$criteria->with = array("product"=>array("select"=>"product.product_number,product.product_name")); 
					$criteria->together = true; // ADDED THIS
                    if(isset($search))   
                     $criteria->condition = "branch_id = $branch and LOWER(`product.product_number`) LIKE LOWER('%$search%')";
                     $product = ProductStock::model()->findAll($criteria);
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val->product_number, "value"=>$val->product_id,  "value2"=>$val->product_name);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
              
        }
         public function actionAutocomplete_name()
      {
         
            
               if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
				   $branch = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                    $search = strtolower($_GET["term"]);
                    $criteria = new CDbCriteria;
					$criteria->with = array("product"=>array("select"=>"product.product_name")); 
					$criteria->together = true; // ADDED THIS
                    if(isset($search))   
                     $criteria->condition = "branch_id = $branch and  LOWER(`product.product_name`) LIKE LOWER('%$search%')";
                     $product = ProductStock::model()->findAll($criteria);
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val->product_name, "value"=>$val->product_id,  "value2"=>$val->product_number,"stock" => $val->quantity);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
              
        }
}
