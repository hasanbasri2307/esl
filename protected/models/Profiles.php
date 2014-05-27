<?php

/**
 * This is the model class for table "{{profiles}}".
 *
 * The followings are the available columns in table '{{profiles}}':
 * @property integer $user_id
 * @property string $name
 * @property string $nik
 * @property string $dob
 * @property string $address
 * @property string $phone
 * @property integer $branch_id
 * @property integer $id_divisi
 * @property integer $id_level_jabatan
 * @property integer $id_jabatan
 * @property string $npwp
 * @property string $education_background
 * @property string $working_location
 * @property string $marital_status
 * @property string $religion
 * @property string $bank_name
 * @property string $bank_account
 * @property string $employee_status
 * @property string $contract_start
 * @property string $contract_jatuh_tempo
 * @property string $id_type
 * @property string $id_number
 * @property string $remarks
 * @property string $foto
 */
class Profiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{profiles}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nik, id_divisi, id_level_jabatan, id_jabatan, npwp, education_background, working_location, marital_status, religion, bank_name, bank_account, employee_status, contract_start, contract_jatuh_tempo, id_type, id_number, remarks, foto', 'required'),
			array('branch_id, id_divisi, id_level_jabatan, id_jabatan', 'numerical', 'integerOnly'=>true),
			array('name, address, phone', 'length', 'max'=>255),
			array('nik, npwp, bank_account, id_number', 'length', 'max'=>30),
			array('working_location, marital_status, foto', 'length', 'max'=>50),
			array('religion', 'length', 'max'=>15),
			array('bank_name', 'length', 'max'=>20),
			array('employee_status', 'length', 'max'=>10),
			array('id_type', 'length', 'max'=>5),
			array('dob', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, name, nik, dob, address, phone, branch_id, id_divisi, id_level_jabatan, id_jabatan, npwp, education_background, working_location, marital_status, religion, bank_name, bank_account, employee_status, contract_start, contract_jatuh_tempo, id_type, id_number, remarks, foto', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
			'jabatan' => array(self::BELONGS_TO, 'Jabatan', 'id_jabatan'),
			'level_jabatan' => array(self::BELONGS_TO, 'LevelJabatan', 'id_level_jabatan'),
			'divisi' => array(self::BELONGS_TO, 'Divisi', 'id_divisi'),
			'branch' => array(self::BELONGS_TO, 'Branch', 'branch_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'name' => 'Full Name',
			'nik' => 'NIK',
			'dob' => 'Date of Birthday',
			'address' => 'Address',
			'phone' => 'Phone',
			'branch_id' => 'Branch',
			'id_divisi' => 'Divisi',
			'id_level_jabatan' => 'Level Jabatan',
			'id_jabatan' => 'Jabatan',
			'npwp' => 'NPWP',
			'education_background' => 'Education Background',
			'working_location' => 'Working Location',
			'marital_status' => 'Marital Status',
			'religion' => 'Religion',
			'bank_name' => 'Bank Name',
			'bank_account' => 'Bank Account',
			'employee_status' => 'Employee Status',
			'contract_start' => 'Contract Start',
			'contract_jatuh_tempo' => 'Contract Jatuh Tempo',
			'id_type' => 'ID Type',
			'id_number' => 'ID Number',
			'remarks' => 'Remarks',
			'foto' => 'Foto',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('nik',$this->nik,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('id_divisi',$this->id_divisi);
		$criteria->compare('id_level_jabatan',$this->id_level_jabatan);
		$criteria->compare('id_jabatan',$this->id_jabatan);
		$criteria->compare('npwp',$this->npwp,true);
		$criteria->compare('education_background',$this->education_background,true);
		$criteria->compare('working_location',$this->working_location,true);
		$criteria->compare('marital_status',$this->marital_status,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('bank_account',$this->bank_account,true);
		$criteria->compare('employee_status',$this->employee_status,true);
		$criteria->compare('contract_start',$this->contract_start,true);
		$criteria->compare('contract_jatuh_tempo',$this->contract_jatuh_tempo,true);
		$criteria->compare('id_type',$this->id_type,true);
		$criteria->compare('id_number',$this->id_number,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('foto',$this->foto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
