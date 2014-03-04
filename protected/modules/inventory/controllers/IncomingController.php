<?php

class IncomingController extends RController
{
	
        
	public function filters()
	{
		 return array( 
                    'rights', 
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
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
                        $model->status =0;
                        $model->from =0;
                        $model->date =  AccountingModule::format_date($model->date);
                       
				if($model->save() && $model->validate()){
                              if(isset($_POST['ProductId'])){
                                    foreach ($_POST['ProductId'] as $key=>$val){
                                        $model_product = new IoDetail();
                                        $model_product->io_id = $model->io_id;
                                        $model_product->product_id = $val;
                                        $model_product->quantity = $_POST["ProductQuantity"][$key];
                                        $model_product->save();
										
										$criteria=new CDbCriteria;
										$criteria->condition='branch_id=:branchID and product_id = :productID';
										$criteria->params=array(':branchID'=>10,':productID'=>$val);
										$post=Post::model()->find($criteria);
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
                                              //update stock PUSAT
                                              if($product_stock->save()) {
                                                   ProductStock::model()->updateCounters( array('quantity'=>-$model_io_detail->quantity_deliver),
                                                        array('condition' => "product_id = $product_stock->product_id AND branch_id= $model->from",
                                                              'params' => array(':product_id' =>$product_stock->product_id , ':from'=>$model->from) 
                                                            ));
                                              } 
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
                $criteria->condition = " `to` = $branch_id";
                if(isset($search)) 
                    $criteria->condition .= " AND LOWER(`io_number`) LIKE LOWER('%$search%') OR LOWER(`io_number`) LIKE LOWER('%$search%') OR LOWER(`io_name`) LIKE LOWER('%$search%') OR LOWER(`io_name`) LIKE LOWER('%$search%')";
                
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
        
}
