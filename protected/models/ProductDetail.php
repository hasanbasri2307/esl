<?php

/**
 * This is the model class for table "{{product_detail}}".
 *
 * The followings are the available columns in table '{{product_detail}}':
 * @property integer $product_detail_id
 * @property integer $productset_id
 * @property integer $product_id
 * @property integer $quantity
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property Product $productset
 */
class ProductDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product_detail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('productset_id, product_id, quantity', 'required'),
			array('productset_id, product_id, quantity', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_detail_id, productset_id, product_id, quantity', 'safe', 'on'=>'search'),
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
			'productset' => array(self::BELONGS_TO, 'Product', 'productset_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_detail_id' => 'Product Detail',
			'productset_id' => 'Productset',
			'product_id' => 'Product',
			'quantity' => 'Quantity',
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

		$criteria->compare('product_detail_id',$this->product_detail_id);
		$criteria->compare('productset_id',$this->productset_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('quantity',$this->quantity);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
