<?php

/**
 * This is the model class for table "{{mesin}}".
 *
 * The followings are the available columns in table '{{mesin}}':
 * @property integer $mesin_id
 * @property string $mesin_number
 * @property string $mesin_name
 * @property string $description
 * @property string $image
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class Mesin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mesin}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mesin_number, mesin_name, user_id, created, changed', 'required'),
			array('user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('mesin_number', 'length', 'max'=>10),
			array('mesin_name', 'length', 'max'=>50),
			array('image', 'length', 'max'=>225),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mesin_id, mesin_number, mesin_name, description, image, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'mesin_id' => 'Mesin',
			'mesin_number' => 'Mesin Number',
			'mesin_name' => 'Mesin Name',
			'description' => 'Description',
			'image' => 'Image',
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

		$criteria->compare('mesin_id',$this->mesin_id);
		$criteria->compare('mesin_number',$this->mesin_number,true);
		$criteria->compare('mesin_name',$this->mesin_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
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
	 * @return Mesin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
