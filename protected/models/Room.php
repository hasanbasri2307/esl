<?php

/**
 * This is the model class for table "{{room}}".
 *
 * The followings are the available columns in table '{{room}}':
 * @property integer $room_id
 * @property integer $branch_id
 * @property string $room_number
 * @property string $room_name
 * @property string $description
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Branch $branch
 */
class Room extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Room the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{room}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('branch_id, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('room_number', 'length', 'max'=>10),
			array('room_name', 'length', 'max'=>40),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('room_id, branch_id, room_number, room_name, description, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
			'room_treatment' => array(self::HAS_MANY,'RoomTreatment','room_id')
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'room_id' => 'Room',
			'branch_id' => 'Branch',
			'room_number' => 'Room Number',
			'room_name' => 'Room Name',
			'description' => 'Description',
			'user_id' => 'User',
			'created' => 'Created',
			'changed' => 'Changed',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('room_number',$this->room_number,true);
		$criteria->compare('room_name',$this->room_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('changed',$this->changed);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}