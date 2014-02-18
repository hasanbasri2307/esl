<?php

/**
 * This is the model class for table "{{io}}".
 *
 * The followings are the available columns in table '{{io}}':
 * @property integer $io_id
 * @property string $description
 * @property integer $from
 * @property integer $to
 * @property string $note
 * @property string $date
 * @property string $date_deliver
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $status
 */
class Io extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{io}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, created, changed', 'required'),
			array('from, to, user_id, created, changed, status', 'numerical', 'integerOnly'=>true),
			array('note', 'length', 'max'=>100),
			array('description, date, date_deliver', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('io_id, description, from, to, note, date, date_deliver, user_id, created, changed, status', 'safe', 'on'=>'search'),
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
                        'branch' => array(self::BELONGS_TO, 'Branch', 'to'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'io_id' => 'Io',
			'description' => 'Description',
			'from' => 'From',
			'to' => 'To',
			'note' => 'Note',
			'date' => 'Date',
			'date_deliver' => 'Date Deliver',
			'user_id' => 'User',
			'created' => 'Created',
			'changed' => 'Changed',
			'status' => 'Status',
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

		$criteria->compare('io_id',$this->io_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('from',$this->from);
		$criteria->compare('to',$this->to);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('date_deliver',$this->date_deliver,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('changed',$this->changed);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Io the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
