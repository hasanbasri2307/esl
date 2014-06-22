<?php

/**
 * This is the model class for table "{{slip_order}}".
 *
 * The followings are the available columns in table '{{slip_order}}':
 * @property integer $id_slip_order
 * @property string $tgl_slip
 * @property integer $order_id
 * @property string $payment_method
 * @property string $card_number
 * @property double $total_bayar
 * @property integer $user_id
 */
class SlipOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{slip_order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_slip, order_id, payment_method, card_number, total_bayar, user_id', 'required'),
			array('order_id, user_id', 'numerical', 'integerOnly'=>true),
			array('total_bayar', 'numerical'),
			array('payment_method', 'length', 'max'=>20),
			array('card_number', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_slip_order, tgl_slip, order_id, payment_method, card_number, total_bayar, user_id', 'safe', 'on'=>'search'),
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
			'id_slip_order' => 'Id Slip Order',
			'tgl_slip' => 'Tgl Slip',
			'order_id' => 'Order',
			'payment_method' => 'Payment Method',
			'card_number' => 'Card Number',
			'total_bayar' => 'Total Payment',
			'user_id' => 'User',
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

		$criteria->compare('id_slip_order',$this->id_slip_order);
		$criteria->compare('tgl_slip',$this->tgl_slip,true);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('payment_method',$this->payment_method,true);
		$criteria->compare('card_number',$this->card_number,true);
		$criteria->compare('total_bayar',$this->total_bayar);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SlipOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
