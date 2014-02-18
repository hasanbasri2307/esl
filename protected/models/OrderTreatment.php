<?php

/**
 * This is the model class for table "{{order_treatment}}".
 *
 * The followings are the available columns in table '{{order_treatment}}':
 * @property integer $order_treatment_id
 * @property integer $order_id
 * @property integer $treatment_id
 * @property integer $quantity
 * @property integer $price
 * @property integer $discount
 * @property integer $discount_rp
 * @property integer $subtotal
 */
class OrderTreatment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{order_treatment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, treatment_id, quantity, price, subtotal', 'required'),
			array('order_id, treatment_id, quantity, price, discount, discount_rp, subtotal', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('order_treatment_id, order_id, treatment_id, quantity, price, discount, discount_rp, subtotal', 'safe', 'on'=>'search'),
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
			'order_treatment_id' => 'Order Treatment',
			'order_id' => 'Order',
			'treatment_id' => 'Treatment',
			'quantity' => 'Quantity',
			'price' => 'Price',
			'discount' => 'Discount',
			'discount_rp' => 'Discount Rp',
			'subtotal' => 'Subtotal',
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

		$criteria->compare('order_treatment_id',$this->order_treatment_id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('treatment_id',$this->treatment_id);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('price',$this->price);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('discount_rp',$this->discount_rp);
		$criteria->compare('subtotal',$this->subtotal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderTreatment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
