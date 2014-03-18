<?php

class UploadController extends RController
{
	
	public function filters()
	{
		 return array( 
            'rights', 
        ); 
	}



	public function actionIndex()
	{
		
        
        Yii::import("ext.EAjaxUpload.qqFileUploader");

                $folder='upload/product/';// folder fo uploaded files
                $allowedExtensions = array("jpg");
                $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder);
                $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                echo $result;// it's array
	}

    public function actionClients()
    {
        
        
        Yii::import("ext.EAjaxUpload.qqFileUploader");

                $folder='upload/client/';// folder for uploaded files
                $allowedExtensions = array("jpg");
                $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder);
                $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
				
                echo $result;// it's array
    }
	
	public function actionMachines()
    {
        
        
        Yii::import("ext.EAjaxUpload.qqFileUploader");

                $folder='upload/machine/';// folder for uploaded files
                $allowedExtensions = array("jpg");
                $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder);
                $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
				
                echo $result;// it's array
    }


}
