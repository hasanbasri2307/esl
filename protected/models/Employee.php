<?php

/**
 * This is the model class for table "{{employee}}".
 *
 * The followings are the available columns in table '{{employee}}':
 * @property integer $id_employee
 * @property string $kd_employee
 * @property string $birthday
 * @property string $nama_lengkap
 * @property string $alamat
 * @property string $email
 * @property string $telepon
 * @property integer $id_jabatan
 * @property integer $id_level_jabatan
 * @property integer $id_divisi
 * @property integer $id_branch
 * @property integer $status_emp
 */
class Employee extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{employee}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kd_employee, birthday, nama_lengkap, alamat, email, telepon, id_jabatan, id_level_jabatan, id_divisi, id_branch, status_emp', 'required'),
			array('id_jabatan, id_level_jabatan, id_divisi, id_branch, status_emp', 'numerical', 'integerOnly'=>true),
			array('kd_employee', 'length', 'max'=>10),
			array('nama_lengkap, email', 'length', 'max'=>50),
			array('alamat', 'length', 'max'=>200),
			array('telepon', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_employee, kd_employee, birthday, nama_lengkap, alamat, email, telepon, id_jabatan, id_level_jabatan, id_divisi, id_branch, status_emp', 'safe', 'on'=>'search'),
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
				'users' => array(self::HAS_ONE,'Users', 'id_employee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_employee' => 'Id Employee',
			'kd_employee' => 'Kd Employee',
			'birthday' => 'Birthday',
			'nama_lengkap' => 'Nama Lengkap',
			'alamat' => 'Alamat',
			'email' => 'Email',
			'telepon' => 'Telepon',
			'id_jabatan' => 'Id Jabatan',
			'id_level_jabatan' => 'Id Level Jabatan',
			'id_divisi' => 'Id Divisi',
			'id_branch' => 'Id Branch',
			'status_emp' => 'Status Emp',
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

		$criteria->compare('id_employee',$this->id_employee);
		$criteria->compare('kd_employee',$this->kd_employee,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('nama_lengkap',$this->nama_lengkap,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('id_jabatan',$this->id_jabatan);
		$criteria->compare('id_level_jabatan',$this->id_level_jabatan);
		$criteria->compare('id_divisi',$this->id_divisi);
		$criteria->compare('id_branch',$this->id_branch);
		$criteria->compare('status_emp',$this->status_emp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Employee the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
