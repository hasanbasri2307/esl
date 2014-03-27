<?php

/**
 * This is the model class for table "{{mesin_detail}}".
 *
 * The followings are the available columns in table '{{mesin_detail}}':
 * @property integer $mesin_detail_id
 * @property integer $mesin_id
 * @property integer $branch_id
 * @property string $date_purchase
 * @property string $date_maintenance
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class MesinDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{mesin_detail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mesin_id, branch_id, date_maintenance, user_id, created, changed', 'required'),
			array('mesin_id, branch_id, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('date_maintenance', 'length', 'max'=>2),
			array('date_purchase', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('mesin_detail_id, mesin_id, branch_id, date_purchase, date_maintenance, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'machine' => array(self::BELONGS_TO, 'Mesin', 'mesin_id'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mesin_detail_id' => 'Mesin Detail',
			'mesin_id' => 'Mesin',
			'branch_id' => 'Branch',
			'date_purchase' => 'Date Purchase',
			'date_maintenance' => 'Date of Maintenance (month)',
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

		$criteria->compare('mesin_detail_id',$this->mesin_detail_id);
		$criteria->compare('mesin_id',$this->mesin_id);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('date_purchase',$this->date_purchase,true);
		$criteria->compare('date_maintenance',$this->date_maintenance,true);
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
	 * @return MesinDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
