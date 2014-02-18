<?php

/**
 * This is the model class for table "{{supplier}}".
 *
 * The followings are the available columns in table '{{supplier}}':
 * @property integer $supplier_id
 * @property string $supplier_number
 * @property string $supplier_name
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property string $ot_start
 * @property string $description
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class Supplier extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{supplier}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('supplier_number, supplier_name, ot_start, user_id, created, changed', 'required'),
			array('user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('supplier_number', 'length', 'max'=>10),
			array('supplier_name', 'length', 'max'=>40),
			array('address', 'length', 'max'=>255),
			array('phone, fax', 'length', 'max'=>20),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('supplier_id, supplier_number, supplier_name, address, phone, fax, ot_start, description, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'supplier_id' => 'Supplier',
			'supplier_number' => 'Supplier Number',
			'supplier_name' => 'Supplier Name',
			'address' => 'Address',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'ot_start' => 'Ot Start',
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

		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('supplier_number',$this->supplier_number,true);
		$criteria->compare('supplier_name',$this->supplier_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('ot_start',$this->ot_start,true);
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
	 * @return Supplier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
