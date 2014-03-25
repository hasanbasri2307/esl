<?php

/**
 * This is the model class for table "{{client_history}}".
 *
 * The followings are the available columns in table '{{client_history}}':
 * @property integer $id_client_history
 * @property integer $client_id
 * @property string $p_1
 * @property string $obat_vitamin
 * @property string $p_2
 * @property string $p_2_desc
 * @property string $p_3
 * @property integer $p_4
 * @property string $p_5
 * @property string $p_6
 * @property string $p_7
 * @property string $rekam_medik_id
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 */
class ClientHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{client_history}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_id, p_1, obat_vitamin, p_2, p_2_desc, p_3, p_4, p_5, p_7, rekam_medik_id, user_id, created, changed', 'required'),
			array('client_id, p_4, user_id, created, changed', 'numerical', 'integerOnly'=>true),
			array('p_1, p_2', 'length', 'max'=>5),
			array('p_6', 'length', 'max'=>30),
			array('p_7, rekam_medik_id', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_client_history, client_id, p_1, obat_vitamin, p_2, p_2_desc, p_3, p_4, p_5, p_6, p_7, rekam_medik_id, user_id, created, changed', 'safe', 'on'=>'search'),
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
			'id_client_history' => 'Id Client History',
			'client_id' => 'Client',
			'p_1' => 'P 1',
			'obat_vitamin' => 'Obat Vitamin',
			'p_2' => 'P 2',
			'p_2_desc' => 'P 2 Desc',
			'p_3' => 'P 3',
			'p_4' => 'P 4',
			'p_5' => 'P 5',
			'p_6' => 'P 6',
			'p_7' => 'P 7',
			'rekam_medik_id' => 'Rekam Medik',
			'user_id' => 'User',
			'created' => 'Created',
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

		$criteria->compare('id_client_history',$this->id_client_history);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('p_1',$this->p_1,true);
		$criteria->compare('obat_vitamin',$this->obat_vitamin,true);
		$criteria->compare('p_2',$this->p_2,true);
		$criteria->compare('p_2_desc',$this->p_2_desc,true);
		$criteria->compare('p_3',$this->p_3,true);
		$criteria->compare('p_4',$this->p_4);
		$criteria->compare('p_5',$this->p_5,true);
		$criteria->compare('p_6',$this->p_6,true);
		$criteria->compare('p_7',$this->p_7,true);
		$criteria->compare('rekam_medik_id',$this->rekam_medik_id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('changed',$this->changed);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientHistory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
