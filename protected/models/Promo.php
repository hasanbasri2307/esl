<?php

/**
 * This is the model class for table "{{promo}}".
 *
 * The followings are the available columns in table '{{promo}}':
 * @property integer $promo_id
 * @property string $promo_number
 * @property string $name
 * @property string $description
 * @property integer $price
 * @property string $image
 * @property string $division
 * @property string $date_start
 * @property string $date_end
 * @property integer $discount
 * @property integer $discount_rp
 * @property string $type
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class Promo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{promo}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promo_number, name, price, division, type, user_id, created, changed', 'required'),
			array('price, discount, discount_rp, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('promo_number', 'length', 'max'=>10),
			array('name', 'length', 'max'=>50),
			array('image', 'length', 'max'=>225),
			array('division', 'length', 'max'=>5),
			array('type', 'length', 'max'=>20),
			array('description, date_start, date_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('promo_id, promo_number, name, description, price, image, division, date_start, date_end, discount, discount_rp, type, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'promo_id' => 'Promo',
			'promo_number' => 'Promo Number',
			'name' => 'Name',
			'description' => 'Description',
			'price' => 'Price',
			'image' => 'Image',
			'division' => 'Division',
			'date_start' => 'Date Start',
			'date_end' => 'Date End',
			'discount' => 'Discount %',
			'discount_rp' => 'Discount Rp',
			'type' => 'Type',
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

		$criteria->compare('promo_id',$this->promo_id);
		$criteria->compare('promo_number',$this->promo_number,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('division',$this->division,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('discount_rp',$this->discount_rp);
		$criteria->compare('type',$this->type,true);
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
	 * @return Promo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
