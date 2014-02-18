<?php

/**
 * This is the model class for table "{{treatment_machine}}".
 *
 * The followings are the available columns in table '{{treatment_machine}}':
 * @property integer $treatment_machine_id
 * @property integer $treatment_id
 * @property integer $machine_id
 */
class TreatmentMachine extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{treatment_machine}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('treatment_id, machine_id', 'required'),
			array('treatment_id, machine_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('treatment_machine_id, treatment_id, machine_id', 'safe', 'on'=>'search'),
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
                    'machine' => array(self::BELONGS_TO, 'Machine', 'machine_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'treatment_machine_id' => 'Treatment Machine',
			'treatment_id' => 'Treatment',
			'machine_id' => 'Machine',
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

		$criteria->compare('treatment_machine_id',$this->treatment_machine_id);
		$criteria->compare('treatment_id',$this->treatment_id);
		$criteria->compare('machine_id',$this->machine_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TreatmentMachine the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
