<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $product_id
 * @property string $product_number
 * @property string $product_name
 * @property string $description
 * @property integer $price
 * @property integer $price_net
 * @property string $image
 * @property integer $unit_homecare
 * @property integer $unit_cabin
 * @property integer $satuan
 * @property integer $satuan_consume
 * @property integer $product_category
 * @property string $netto
 * @property string $type
 * @property string $date_start
 * @property string $date_end
 * @property double $discount
 * @property double $discount_rp
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class Product extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_number', 'required','on'=>'create'),
			array('product_name', 'required','on'=>'upload'),
			array('product_number, product_name, price, unit_homecare', 'required','on'=>'update_inventory'),
			array('price, price_net, unit_homecare, unit_cabin, satuan, satuan_consume, product_category, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('discount, discount_rp', 'numerical'),
			array('product_number', 'length', 'max'=>10),
			array('product_name', 'length', 'max'=>100),
			array('image', 'length', 'max'=>225),
			array('netto', 'length', 'max'=>6),
			array('type', 'length', 'max'=>34),
			array('description, date_start, date_end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('product_id, product_number, product_name, description, price, price_net, image, unit_homecare, unit_cabin, satuan, satuan_consume, product_category, netto, type, date_start, date_end, discount, discount_rp, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			 'productDetails' => array(self::HAS_MANY, 'ProductDetail', 'product_id'),
						'productDetails1' => array(self::HAS_MANY, 'ProductDetail', 'productset_id'),
                        'unitHomecare' => array(self::BELONGS_TO, 'Unit', 'unit_homecare'),
                        'productCategory' => array(self::BELONGS_TO, 'ProductCategory', 'product_category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'Product',
			'product_number' => 'Product Number',
			'product_name' => 'Product Name',
			'description' => 'Description',
			'price' => 'Price',
			'price_net' => 'Price Net',
			'image' => 'Image',
			'unit_homecare' => 'Unit Homecare',
			'unit_cabin' => 'Unit Cabin',
			'satuan' => 'Satuan',
			'satuan_consume' => 'Satuan Consume',
			'product_category' => 'Product Category',
			'netto' => 'Netto',
			'type' => 'Type',
			'date_start' => 'Date Start',
			'date_end' => 'Date End',
			'discount' => 'Discount',
			'discount_rp' => 'Discount Rp',
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

		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('product_number',$this->product_number,true);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('price_net',$this->price_net);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('unit_homecare',$this->unit_homecare);
		$criteria->compare('unit_cabin',$this->unit_cabin);
		$criteria->compare('satuan',$this->satuan);
		$criteria->compare('satuan_consume',$this->satuan_consume);
		$criteria->compare('product_category',$this->product_category);
		$criteria->compare('netto',$this->netto,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('date_start',$this->date_start,true);
		$criteria->compare('date_end',$this->date_end,true);
		$criteria->compare('discount',$this->discount);
		$criteria->compare('discount_rp',$this->discount_rp);
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
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
    {
        if($this->isNewRecord)
        {          
           
           
        }else{
            Yii::app()->format->unformatNumber($this->price);
        }
        return parent::beforeSave();
    }
}
