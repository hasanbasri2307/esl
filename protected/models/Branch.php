<?php

/**
 * This is the model class for table "{{branch}}".
 *
 * The followings are the available columns in table '{{branch}}':
 * @property integer $branch_id
 * @property string $branch_number
 * @property string $branch_name
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property string $ot_start
 * @property string $ot_end
 * @property string $description
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property Room[] $rooms
 */
class Branch extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{branch}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('branch_number', 'length', 'max'=>10),
			array('branch_name', 'length', 'max'=>40),
			array('address', 'length', 'max'=>255),
			array('phone, fax', 'length', 'max'=>20),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('branch_id, branch_number, branch_name, address, phone, fax, ot_start, ot_end, description, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'rooms' => array(self::HAS_MANY, 'Room', 'branch_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'branch_id' => 'Branch',
			'branch_number' => 'Branch Number',
			'branch_name' => 'Branch Name',
			'address' => 'Address',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'ot_start' => 'Ot Start',
			'ot_end' => 'Ot End',
			'description' => 'Description',
			'user_id' => 'User',
			'created' => 'Created',
			'changed' => 'Changed',
			'active' => 'Active',
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

		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('branch_number',$this->branch_number,true);
		$criteria->compare('branch_name',$this->branch_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('ot_start',$this->ot_start,true);
		$criteria->compare('ot_end',$this->ot_end,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('changed',$this->changed);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Branch the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
