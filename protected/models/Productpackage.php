<?php

/**
 * This is the model class for table "{{productpackage}}".
 *
 * The followings are the available columns in table '{{productpackage}}':
 * @property integer $productpackage_id
 * @property string $productpackage_number
 * @property string $productpackage_name
 * @property integer $price
 * @property double $discount_percent
 * @property double $discount_rp
 * @property string $description
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class Productpackage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{productpackage}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('productpackage_number, productpackage_name, price,  description, user_id, created, changed', 'required','on'=>'create'),
			array(' price,discount_percent,discount_rp  ', 'required','on'=>'accounting'),
			array('price, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('discount_percent, discount_rp', 'numerical'),
			array('productpackage_number', 'length', 'max'=>10),
			array('productpackage_name', 'length', 'max'=>30),
			array('description', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('productpackage_id, productpackage_number, productpackage_name, price, discount_percent, discount_rp, description, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'productpackage_id' => 'Productpackage',
			'productpackage_number' => 'Productpackage Number',
			'productpackage_name' => 'Productpackage Name',
			'price' => 'Price',
			'discount_percent' => 'Discount Percent',
			'discount_rp' => 'Discount Rp',
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

		$criteria->compare('productpackage_id',$this->productpackage_id);
		$criteria->compare('productpackage_number',$this->productpackage_number,true);
		$criteria->compare('productpackage_name',$this->productpackage_name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('discount_percent',$this->discount_percent);
		$criteria->compare('discount_rp',$this->discount_rp);
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
	 * @return Productpackage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeValidate()
	 {
		 $this->price= Yii::app()->format->unformatNumber($this->price);
		 $this->discount_rp= Yii::app()->format->unformatNumber($this->discount_rp);
		 
		 return parent::beforeValidate();
	}
	protected function afterFind() {
		$this->price = Yii::app()->format->formatNumber($this->price);
		$this->discount_rp= Yii::app()->format->formatNumber($this->discount_rp);
		
		return parent::afterFind();
	}
}
