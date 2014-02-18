<?php

/**
 * This is the model class for table "{{room_treatment}}".
 *
 * The followings are the available columns in table '{{room_treatment}}':
 * @property integer $room_treatment_id
 * @property integer $room_id
 * @property integer $treatment_id
 */
class RoomTreatment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RoomTreatment the static model class
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
		return '{{room_treatment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('room_id, treatment_id', 'required'),
			array('room_id, treatment_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('room_treatment_id, room_id, treatment_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'room_treatment_id' => 'Room Treatment',
			'room_id' => 'Room',
			'treatment_id' => 'Treatment',
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

		$criteria->compare('room_treatment_id',$this->room_treatment_id);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('treatment_id',$this->treatment_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}