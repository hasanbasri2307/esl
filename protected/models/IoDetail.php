<?php

/**
 * This is the model class for table "{{io_detail}}".
 *
 * The followings are the available columns in table '{{io_detail}}':
 * @property integer $io_detail_id
 * @property integer $io_id
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $quantity_deliver
 * @property string $kadaluarsa
 */
class IoDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{io_detail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			
			array('io_id, product_id, quantity, quantity_deliver', 'numerical', 'integerOnly'=>true),
			array('kadaluarsa', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('io_detail_id, io_id, product_id, quantity, quantity_deliver, kadaluarsa', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'io_detail_id' => 'Io Detail',
			'io_id' => 'Io',
			'product_id' => 'Product',
			'quantity' => 'Quantity',
			'quantity_deliver' => 'Quantity Deliver',
			'kadaluarsa' => 'Kadaluarsa',
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

		$criteria->compare('io_detail_id',$this->io_detail_id);
		$criteria->compare('io_id',$this->io_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('quantity_deliver',$this->quantity_deliver);
		$criteria->compare('kadaluarsa',$this->kadaluarsa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IoDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
