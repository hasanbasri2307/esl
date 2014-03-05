<?php

class OutgoingController extends RController
{
	
        
	public function filters()
	{
		 return array( 
                    'rights', 
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
                                        $ps = ProductStock::model()->find(array("condition"=>"product_id =$val AND branch_id=$model->to".$model->to));
                                        if(isset($ps)){
                                            $ps->quantity=$ps->quantity + $model_product->quantity;
                                            $ps->changed=$time;
                                            $ps->save();
                                        }else{
                                            
                                            $model_ps = new ProductStock();
                                            $model_ps->product_id=$val;
                                            $model_ps->branch_id=$model->to;
                                            $model_ps->quantity=$model_product->quantity;
                                            $model_ps->changed=$time;
                                            $model_ps->save();
                                            
                                        }
										 $ps2 = ProductStock::model()->find(array("condition"=>"product_id =$val AND branch_id=$branch"));
										  $ps2->quantity=$ps2->quantity - $model_product->quantity;
										 $ps->changed=$time;
                                            $ps->save();
										
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
                    $criteria->condition .= " LOWER(`io_number`) LIKE LOWER('%$search%') OR LOWER(`io_number`) LIKE LOWER('%$search%') OR LOWER(`io_name`) LIKE LOWER('%$search%') OR LOWER(`io_name`) LIKE LOWER('%$search%')";
                
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
