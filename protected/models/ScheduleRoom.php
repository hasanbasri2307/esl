<?php

/**
 * This is the model class for table "{{schedule_room}}".
 *
 * The followings are the available columns in table '{{schedule_room}}':
 * @property integer $schedule_room_id
 * @property integer $branch_id
 * @property integer $room_id
 * @property integer $client_id
 * @property string $date_t
 * @property string $time_t
 * @property string $duration
 * @property string $end_time
 * @property integer $user_id
 * @property integer $status
 * @property integer $changed
 * @property integer $created
 */
class ScheduleRoom extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{schedule_room}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('branch_id, room_id, client_id, date_t, time_t, duration, end_time, user_id, status', 'required'),
			array('branch_id, room_id, client_id, date_t, time_t, duration, end_time, user_id, status', 'safe','on'=>'create'),
			array('branch_id, room_id, client_id, user_id, status, changed, created', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('schedule_room_id, branch_id, room_id, client_id, date_t, time_t, duration, end_time', 'safe', 'on'=>'update'),
			array('schedule_room_id, branch_id, room_id, client_id, date_t, time_t, duration, end_time, user_id, status, changed, created', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'client' => array(self::BELONGS_TO, 'Client', 'client_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'schedule_room_id' => 'Schedule Room',
			'branch_id' => 'Branch',
			'room_id' => 'Room',
			'client_id' => 'Client',
			'date_t' => 'Date T',
			'time_t' => 'Time T',
			'duration' => 'Duration',
			'end_time' => 'End Time',
			'user_id' => 'User',
			'status' => 'Status',
			'changed' => 'Changed',
			'created' => 'Created',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('schedule_room_id',$this->schedule_room_id);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('date_t',$this->date_t,true);
		$criteria->compare('time_t',$this->time_t,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('end_time',$this->end_time,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('changed',$this->changed);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ScheduleRoom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
