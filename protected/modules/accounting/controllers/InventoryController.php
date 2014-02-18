<?php

class InventoryController extends RController
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
                $model = Product::model()->findByPk($id);
                $model_detail = ProductDetail::model()->findAll(array("condition"=>"productset_id=$id"));
		$this->render('view',array(
			'model'=>$model,
                        'model_detail'=>$model_detail,
		));
	}

	public function actionIndex($search=NULL)
	{
                $criteria = new CDbCriteria;
               // $criteria->condition = "type = 'homecare'";
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
      
 

	

 
}
