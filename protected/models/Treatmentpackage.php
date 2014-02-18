<?php

/**
 * This is the model class for table "{{treatmentpackage}}".
 *
 * The followings are the available columns in table '{{treatmentpackage}}':
 * @property integer $treatmentpackage_id
 * @property string $treatmentpackage_number
 * @property string $treatmentpackage_name
 * @property integer $price
 * @property integer $division_id
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class Treatmentpackage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Treatmentpackage the static model class
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
		return '{{treatmentpackage}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('treatmentpackage_number, treatmentpackage_name, price, division_id, user_id, created, changed', 'required'),
			array('price, division_id, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('treatmentpackage_number', 'length', 'max'=>10),
			array('treatmentpackage_name', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('treatmentpackage_id, treatmentpackage_number, treatmentpackage_name, price, division_id, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'treatmentpackage_id' => 'Treatmentpackage',
			'treatmentpackage_number' => 'Treatmentpackage Number',
			'treatmentpackage_name' => 'Treatmentpackage Name',
			'price' => 'Price',
			'division_id' => 'Division',
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

		$criteria->compare('treatmentpackage_id',$this->treatmentpackage_id);
		$criteria->compare('treatmentpackage_number',$this->treatmentpackage_number,true);
		$criteria->compare('treatmentpackage_name',$this->treatmentpackage_name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('division_id',$this->division_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('changed',$this->changed);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}