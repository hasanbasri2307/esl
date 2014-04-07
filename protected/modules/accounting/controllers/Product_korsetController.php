<?php

class Product_korsetController extends RController
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
            return ''; 
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
                        $model->type = "homecare";
						 $model->type2 = "korset";
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
			if($model->save()){
                            if($model->unit->unit_code=="set"){
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
                $criteria->condition = "type2 = 'korset'";
                if(isset($search)) 
                    $criteria->condition = "AND  LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%')";
                
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
		$model=Product::model()->find(array("condition"=>"product_id=$id AND type2='korset'"));
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
        
   
}
