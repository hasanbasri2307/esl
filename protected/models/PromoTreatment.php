<?php

/**
 * This is the model class for table "{{promo_treatment}}".
 *
 * The followings are the available columns in table '{{promo_treatment}}':
 * @property integer $promo_product_id
 * @property integer $promo_id
 * @property integer $treatment_id
 * @property integer $quantity
 */
class PromoTreatment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{promo_treatment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promo_id, treatment_id, quantity', 'required'),
			array('promo_id, treatment_id, quantity', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('promo_product_id, promo_id, treatment_id, quantity', 'safe', 'on'=>'search'),
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
                    'treatment' => array(self::BELONGS_TO, 'Treatment', 'treatment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'promo_product_id' => 'Promo Product',
			'promo_id' => 'Promo',
			'treatment_id' => 'Treatment',
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

		$criteria->compare('promo_product_id',$this->promo_product_id);
		$criteria->compare('promo_id',$this->promo_id);
		$criteria->compare('treatment_id',$this->treatment_id);
		$criteria->compare('quantity',$this->quantity);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PromoTreatment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
