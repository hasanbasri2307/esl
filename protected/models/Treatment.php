<?php

/**
 * This is the model class for table "{{treatment}}".
 *
 * The followings are the available columns in table '{{treatment}}':
 * @property integer $treatment_id
 * @property string $treatment_number
 * @property string $treatment_name
 * @property string $description
 * @property string $duration
 * @property integer $price
 * @property integer $point
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class Treatment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
     public $protocol;
        public $exfoliate;
        public $repair;
        public $maintain;
	public function tableName()
	{
		return '{{treatment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('treatment_number, treatment_name, duration, price, point, user_id, created, changed', 'required'),
			array('price, point, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('treatment_number', 'length', 'max'=>10),
			array('treatment_name', 'length', 'max'=>40),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('treatment_id, treatment_number, treatment_name, description, duration, price, point, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'treatment_id' => 'Treatment',
			'treatment_number' => 'Treatment Number',
			'treatment_name' => 'Treatment Name',
			'description' => 'Description',
			'duration' => 'Duration',
			'price' => 'Price',
			'point' => 'Point',
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

		$criteria->compare('treatment_id',$this->treatment_id);
		$criteria->compare('treatment_number',$this->treatment_number,true);
		$criteria->compare('treatment_name',$this->treatment_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('point',$this->point);
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
	 * @return Treatment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
