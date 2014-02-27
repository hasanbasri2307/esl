<?php

/**
 * This is the model class for table "{{client}}".
 *
 * The followings are the available columns in table '{{client}}':
 * @property integer $client_id
 * @property string $client_name
 * @property integer $sex_id
 * @property integer $marital_status_id
 * @property integer $nationality_id
 * @property integer $id_card_id
 * @property string $id_card_number
 * @property string $client_number
 * @property string $dop
 * @property string $dob
 * @property string $address
 * @property string $city
 * @property string $zip_code
 * @property string $telephone
 * @property string $phone_kantor
 * @property string $hp1
 * @property string $hp2
 * @property string $email
 * @property string $pict
 * @property integer $source_info_id
 * @property integer $branch_id
 * @property integer $user_id
 * @property integer $created
 * @property integer $changed
 * @property integer $active
 */
class Client extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{client}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_name, sex_id, id_card_id, dop, dob, address, city, zip_code, telephone, phone_kantor, hp1, hp2, email, source_info_id, branch_id, user_id, created, changed', 'required'),
			array('sex_id, marital_status_id, nationality_id, id_card_id, source_info_id, branch_id, user_id, created, changed, active', 'numerical', 'integerOnly'=>true),
			array('client_name', 'length', 'max'=>30),
			array('id_card_number, client_number, dop, city', 'length', 'max'=>20),
			array('address', 'length', 'max'=>225),
			array('zip_code', 'length', 'max'=>10),
			array('telephone, phone_kantor, hp1, hp2', 'length', 'max'=>15),
			array('email', 'length', 'max'=>50),
			array('pict', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('client_id, client_name, sex_id, marital_status_id, nationality_id, id_card_id, id_card_number, client_number, dop, dob, address, city, zip_code, telephone, phone_kantor, hp1, hp2, email, pict, source_info_id, branch_id, user_id, created, changed, active', 'safe', 'on'=>'search'),
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
			'client_id' => 'Client',
			'client_name' => 'Client Name',
			'sex_id' => 'Gender',
			'marital_status_id' => 'Marital Status',
			'nationality_id' => 'Nationality',
			'id_card_id' => 'Id Card',
			'id_card_number' => 'Id Card Number',
			'client_number' => 'Client Number',
			'dop' => 'Dop',
			'dob' => 'Date of Birtday',
			'address' => 'Address',
			'city' => 'City',
			'zip_code' => 'Zip Code',
			'telephone' => 'Home Number',
			'phone_kantor' => 'Office Number',
			'hp1' => 'Handphone 1',
			'hp2' => 'Handphone 2',
			'email' => 'Email',
			'pict' => 'Pict',
			'source_info_id' => 'Source Info',
			'branch_id' => 'Branch',
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

		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('sex_id',$this->sex_id);
		$criteria->compare('marital_status_id',$this->marital_status_id);
		$criteria->compare('nationality_id',$this->nationality_id);
		$criteria->compare('id_card_id',$this->id_card_id);
		$criteria->compare('id_card_number',$this->id_card_number,true);
		$criteria->compare('client_number',$this->client_number,true);
		$criteria->compare('dop',$this->dop,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('phone_kantor',$this->phone_kantor,true);
		$criteria->compare('hp1',$this->hp1,true);
		$criteria->compare('hp2',$this->hp2,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pict',$this->pict,true);
		$criteria->compare('source_info_id',$this->source_info_id);
		$criteria->compare('branch_id',$this->branch_id);
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
	 * @return Client the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
