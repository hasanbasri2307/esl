<?php

/**
 * This is the model class for table "{{treatment_procedure}}".
 *
 * The followings are the available columns in table '{{treatment_procedure}}':
 * @property integer $treatment_procedure_id
 * @property integer $treatment_id
 * @property string $title
 * @property string $description
 * @property integer $sortOrder
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class TreatmentProcedure extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{treatment_procedure}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('treatment_id, title, user_id, created, changed', 'required'),
			array('treatment_id, sortOrder, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>40),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('treatment_procedure_id, treatment_id, title, description, sortOrder, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'treatment_procedure_id' => 'Treatment Procedure',
			'treatment_id' => 'Treatment',
			'title' => 'Title',
			'description' => 'Description',
			'sortOrder' => 'Sort Order',
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

		$criteria->compare('treatment_procedure_id',$this->treatment_procedure_id);
		$criteria->compare('treatment_id',$this->treatment_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sortOrder',$this->sortOrder);
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
	 * @return TreatmentProcedure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
