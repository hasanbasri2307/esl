<?php

class ScheduleController extends RController
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
	


	/**
	 * Lists all models.
	 */
	public function actionIndex($date=NULL)
	{
		if(isset($date)) {
                   $date_array['time'] = strtotime($date);
                   $date_array['str'] = $date;
                }else{
                    $date_array['time'] = time();
                    $date_array['str'] = date("Y-m-d",$date_array['time']);
                   
                }
                
                     $branch_id =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                    
                
                $model = ScheduleRoom::model()->findAll(array('condition'=>'branch_id=:branch_id','params'=>array(':branch_id'=>$branch_id)));
				$room = Room::model()->findAll(array('condition'=>'branch_id=:branch_id','params'=>array(':branch_id'=>$branch_id)));
                $this->render('index',array(
			'model'=>$model,
			'room' =>$room,
            'date'=>$date_array,
			'branch_id'=>$branch_id,
		));
	}
	
	public function actionData_client()
	{
		
         $id =$_POST['id'];
		 $sql = "select *, ADDTIME(s.time_t,s.duration) as selesai, s.description as des from esc_schedule_room s inner join esc_client c on s.client_id = c.client_id where s.schedule_room_id ='".$id."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$dataReader=$command->queryAll();
		echo CJSON::encode($dataReader);
           
	}
	
	public function actionConfirmation()
	{
		$id = $_POST['id'];
		 $sql = "update esc_schedule_room set status = 3 where schedule_room_id ='".$id."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command->query();
	}
	
	public function actionCancel()
	{
		$id = $_POST['id'];
		$sql = "update esc_schedule_room set status = 2 where schedule_room_id ='".$id."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command->query();
	}
	
	public function actionUpdate($id)
	{
		$model=ScheduleRoom::model()->findByPk($id);
               
                //$room_treatment= RoomTreatment::model()->findAll(array("condition"=>"room_id=$id"));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['ScheduleRoom']))
		{
			$model->attributes=$_POST['ScheduleRoom'];
			$date = $model->date_t;
			$branch_id = $model->branch_id;
			$room_id = $model->room_id;
			$time = $model->time_t;
			$duration = $model->duration;
			$secs = strtotime("00:00:01")-strtotime("00:00:00");
			$result = date("H:i:s",strtotime($time)+$secs);
			$secs1 = strtotime($duration)-strtotime("00:00:00");
			$result1 = date("H:i:s",strtotime($time)+$secs);
			$model->end_time = $result1;
			
			$criteria = new CDbCriteria();
			$criteria->condition = " branch_id = :branch_id and room_id = :room_id and date_t = :date and CAST(:waktu AS TIME ) BETWEEN time_t AND end_time";
			$criteria->params = array(':waktu'=>$result,':branch_id'=>$branch_id,':room_id'=>$room_id,':date'=>$date);
			$count = ScheduleRoom::model()->count($criteria);
			if($count > 0)
			{
				Yii::app()->user->setFlash('alert','<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Error !!
										</strong>

										Jadwal Bentrok
										<br>
									</div>');
					$this->redirect(array('Schedule/update/id/'.$model->schedule_room_id));			
			}
			else
			{
				
			
			if($model->save())
			{
				
				Yii::app()->user->setFlash('alert','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Success !!
										</strong>

										Jadwal Berhasil Diubah
										<br>
									</div>');
				$this->redirect(array('schedule/index/date/'.$model->date_t));
			}}

		}

		$this->render('update',array(
			'model'=>$model
		));
	}


	public function actionCancelled($id)
	{
		$model=ScheduleRoom::model()->findByPk($id);
               
                //$room_treatment= RoomTreatment::model()->findAll(array("condition"=>"room_id=$id"));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['ScheduleRoom']))
		{
			$model->attributes=$_POST['ScheduleRoom'];
			$date = $model->date_t;
			$branch_id = $model->branch_id;
			$room_id = $model->room_id;
			$time = $model->time_t;
			$duration = $model->duration;
			$secs = strtotime("00:00:01")-strtotime("00:00:00");
			$result = date("H:i:s",strtotime($time)+$secs);
			$secs1 = strtotime($duration)-strtotime("00:00:00");
			$result1 = date("H:i:s",strtotime($time)+$secs);
			$model->end_time = $result1;
			$model->status=2;
			
			
			if($model->save())
			{
				
				Yii::app()->user->setFlash('alert','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Success !!
										</strong>

										Jadwal Berhasil Diubah
										<br>
									</div>');
				$this->redirect(array('schedule/index/date/'.$model->date_t));
			}

		}

		$this->render('update',array(
			'model'=>$model
		));
	}
	
	
	public function actionCreate()
	{
		$model=new ScheduleRoom('create');
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ScheduleRoom']))
		{
			$model->attributes=$_POST['ScheduleRoom'];
                        $time = time();
                        $model->branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
						$model->user_id =Yii::app()->getModule('user')->user()->profile->getAttribute('user_id');
						$model->client_id =$_POST['client_id'];
                        $model->changed =$time;
                        $model->created =$time;
						$model->status = 1;
						$secs = strtotime("00:00:01")-strtotime("00:00:00");
						$result = date("H:i:s",strtotime($_POST['ScheduleRoom']['time_t'])+$secs);
						$secs1 = strtotime($_POST['ScheduleRoom']['duration'])-strtotime("00:00:00");
						$result1 = date("H:i:s",strtotime($_POST['ScheduleRoom']['time_t'])+$secs1);
						$model->end_time = $result1;
						
						$criteria = new CDbCriteria();
						$criteria->condition = " branch_id = :branch_id and room_id = :room_id and date_t = :date and CAST(:waktu AS TIME ) BETWEEN time_t AND end_time";
						$criteria->params = array(':waktu'=>$result,':branch_id'=>Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'),':room_id'=>$_POST['ScheduleRoom']['room_id'],':date'=>$_POST['ScheduleRoom']['date_t']);
						$count = ScheduleRoom::model()->count($criteria);
						if($count > 0)
						{
							Yii::app()->user->setFlash('alert','<div class="alert alert-error">
													<button type="button" class="close" data-dismiss="alert">
														<i class="icon-remove"></i>
													</button>
			
													<strong>
														<i class="icon-remove"></i>
														Error !!
													</strong>
			
													Jadwal Bentrok
													<br>
												</div>');
								$this->redirect(array('schedule/create/'));			
						}
						else
						{
							
						
							if($model->save())
							{
								
								Yii::app()->user->setFlash('alert','<div class="alert alert-success">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>
				
														<strong>
															<i class="icon-remove"></i>
															Success !!
														</strong>
				
														Jadwal Berhasil Dibuat
														<br>
													</div>');
								$this->redirect(array('schedule/index/date/'.$model->date_t));
							}
						}
					
				
		}

		$this->render('create',array(
			'model'=>$model
		));
	}
	public function actionAutocomplete_name()
      {
         
            
               
                  if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
                    $search = strtolower($_GET["term"]);
                    $criteria = new CDbCriteria;
                    if(isset($search))   
                     $criteria->condition = " LOWER(`client_name`) LIKE LOWER('%$search%')";
                     $product = Client::model()->findAll($criteria);
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val->client_name, "value"=>$val->client_id);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
        }
        
        public function actionGetClient()
      {
    
            $id = $_POST['id'];
            $output = Client::model()->findByPk($id);
                   
            echo CJSON::encode($output);   
              
              
        }

        public function actionPrintOutReservation()
	{
		$model=new Client('create');
		$this->render('reservation_report',array(
			'model'=>$model
		));
	}

	public function actionPrintDaily()
	{
		$date= $_POST['tanggal'];
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT * FROM esc_schedule_room inner join esc_room on esc_room.room_id = esc_schedule_room.room_id inner join esc_client on esc_client.client_id = esc_schedule_room.client_id inner join esc_branch on esc_branch.branch_id = esc_schedule_room.branch_id where esc_schedule_room.branch_id = $branch and esc_schedule_room.date_t = '$date'";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Reservation Daily Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Reservation Daily Report', "Euro Media");

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

$pdf->Write(0, 'Reservation Daily Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $date  , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:14.5%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Client ID</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Room</th>
 	<th>Date</th>
 	<th>Time</th>
 	<th>Duration</th>
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['client_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['room_name'].'</td>
 		<td>'.$data['date_t'].'</td>
 		<td>'.$data['time_t'].'</td>
 		<td>'.$data['duration'].'</td>
 		</tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Reservation Daily.pdf', 'I');

	}

	public function actionPrintMonthly()
	{
		$year = $_POST['tahun'];
		$month= $_POST['bulan'];
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT * FROM esc_schedule_room inner join esc_room on esc_room.room_id = esc_schedule_room.room_id inner join esc_client on esc_client.client_id = esc_schedule_room.client_id inner join esc_branch on esc_branch.branch_id = esc_schedule_room.branch_id where esc_schedule_room.branch_id = $branch and MONTH(esc_schedule_room.date_t) = '$month' and YEAR(esc_schedule_room.date_t) = '$year'";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Reservation Monthly Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Reservation Monthly Report', "Euro Media");

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

$pdf->Write(0, 'Reservation Monthly Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $this->bulan($month).' '.$year  , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:14.5%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Client ID</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Room</th>
 	<th>Date</th>
 	<th>Time</th>
 	<th>Duration</th>
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['client_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['room_name'].'</td>
 		<td>'.$data['date_t'].'</td>
 		<td>'.$data['time_t'].'</td>
 		<td>'.$data['duration'].'</td>
 		</tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Reservation Monthly.pdf', 'I');

	}

	public function actionPrintYearly()
	{
		$year = $_POST['tahun'];
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT * FROM esc_schedule_room inner join esc_room on esc_room.room_id = esc_schedule_room.room_id inner join esc_client on esc_client.client_id = esc_schedule_room.client_id inner join esc_branch on esc_branch.branch_id = esc_schedule_room.branch_id where esc_schedule_room.branch_id = $branch and YEAR(esc_schedule_room.date_t) = '$year'";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Reservation Yearly Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Reservation Yearly Report', "Euro Media");

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

$pdf->Write(0, 'Reservation Yearly Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $year  , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:14.5%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Client ID</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Room</th>
 	<th>Date</th>
 	<th>Time</th>
 	<th>Duration</th>
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['client_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['room_name'].'</td>
 		<td>'.$data['date_t'].'</td>
 		<td>'.$data['time_t'].'</td>
 		<td>'.$data['duration'].'</td>
 		</tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Reservation Yearly.pdf', 'I');

	}

	public function actionPrintPeriode()
	{
		$from = $_POST['dari'];
		$to = $_POST['sampai'];
		$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
		$sql = "SELECT * FROM esc_schedule_room inner join esc_room on esc_room.room_id = esc_schedule_room.room_id inner join esc_client on esc_client.client_id = esc_schedule_room.client_id inner join esc_branch on esc_branch.branch_id = esc_schedule_room.branch_id where esc_schedule_room.branch_id = $branch and esc_schedule_room.date_t between '$from' and '$to'";
		 $connection=Yii::app()->db;
		 $command=$connection->createCommand($sql);
		 $model = $command->queryAll();	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Euro Medica');
$pdf->SetTitle('Reservation Periode Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Reservation Periode Report', "Euro Media");

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

$pdf->Write(0, 'Reservation Periode Report', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 13);
$pdf->Write(0, 'Branch '.Yii::app()->getModule('user')->user()->profile->branch->branch_name , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Write(0, $from.' - '.$to  , '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('helvetica', '', 10);
$pdf->Ln();

// -----------------------------------------------------------------------------



// NON-BREAKING ROWS (nobr="true")
$tbl="";
$tbl .= '

<style type="text/css">
.myOtherTable { background-color:#FFFFE0;border-collapse:collapse;color:#000;font-size:16px; }
.myOtherTable th { background-color:#BDB76B;color:white;width:14.5%; }
.myOtherTable td { padding:5px;border:0; }
.myOtherTable td { font-family:Georgia, Garamond, serif; border-bottom:1px dotted #BDB76B; }
</style>


<table class="myOtherTable">
 <tr>
 	<th>Client ID</th>
 	<th>Client Name</th>
 	<th>Branch</th>
 	<th>Room</th>
 	<th>Date</th>
 	<th>Time</th>
 	<th>Duration</th>
 </tr>
 ';
 foreach($model as $data) {
 	$tbl .='<tr>
 		<td>'.$data['client_number'].'</td>
 		<td>'.$data['client_name'].'</td>
 		<td>'.$data['branch_name'].'</td>
 		<td>'.$data['room_name'].'</td>
 		<td>'.$data['date_t'].'</td>
 		<td>'.$data['time_t'].'</td>
 		<td>'.$data['duration'].'</td>
 		</tr>';
 }
 
$tbl .="</table>";

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Laporan Reservation Monthly.pdf', 'I');

	}

	private function bulan($bulan)
	{
		switch ($bulan) {
			case '1':
				$month_name = "January";
				break;
			case '2':
				$month_name = "February";
				break;
			case '3':
				$month_name = "March";
				break;
			case '4':
				$month_name = "April";
				break;
			case '5':
				$month_name = "May";
				break;
			case '6':
				$month_name = "June";
				break;
			case '7':
				$month_name = "July";
				break;
			case '8':
				$month_name = "August";
				break;
			case '9':
				$month_name = "September";
				break;
			case '10':
				$month_name = "October";
				break;
			case '11':
				$month_name = "November";
				break;
			case '12':
				$month_name = "December";
				break;
			default:
				# code...
				break;
		}
		return $month_name;
	}


	
}
