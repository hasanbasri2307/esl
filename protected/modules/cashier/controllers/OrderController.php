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

	public function actionPayment($id)
	{
		$model=$this->loadModel($id);
		$model_slip = new SlipOrder;
		$model_detail = DetailOrder::model()->findAll(array("condition"=>"order_id=$model->order_id"));

		if(isset($_POST['SlipOrder']))
		{
			$model_slip->attributes=$_POST['SlipOrder'];
			$model_slip->tgl_slip = date("Y-m-d");
			$model_slip->user_id =Yii::app()->getModule('user')->user()->id;
			$model_slip->order_id = $_POST['order_id'];


			if($model_slip->save())
				$model->status=1;
				$model->save();
				$this->redirect(array('view','id'=>$model->order_id));
		}

		$this->render('payment',array(
			'model'=>$model,
			'model_slip'=>$model_slip,
			'model_detail'=>$model_detail,
		));

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
	
}
