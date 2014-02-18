<?php

/**
 * This is the model class for table "{{product_stock}}".
 *
 * The followings are the available columns in table '{{product_stock}}':
 * @property integer $product__stock_id
 * @property string $product_id
 * @property integer $branch_id
 * @property integer $quantity
 * @property integer $changed
 */
class ProductStock extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product_stock}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, branch_id, quantity, changed', 'required'),
			array('branch_id, quantity, changed', 'numerical', 'integerOnly'=>true),
			array('product_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product__stock_id, product_id, branch_id, quantity, changed', 'safe', 'on'=>'search'),
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
			'product__stock_id' => 'Product Stock',
			'product_id' => 'Product',
			'branch_id' => 'Branch',
			'quantity' => 'Quantity',
			'changed' => 'Changed',
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

		$criteria->compare('product__stock_id',$this->product__stock_id);
		$criteria->compare('product_id',$this->product_id,true);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('changed',$this->changed);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductStock the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
