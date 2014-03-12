<?php

/**
 * This is the model class for table "{{profiles}}".
 *
 * The followings are the available columns in table '{{profiles}}':
 * @property integer $user_id
 * @property string $name
 * @property string $dob
 * @property string $address
 * @property string $phone
 * @property integer $branch_id
 * @property integer $id_divisi
 * @property integer $id_level_jabatan
 * @property integer $id_jabatan
 * @property string $foto
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Profile extends CActiveRecord
{

	public $filee;
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
			array('id_divisi, id_level_jabatan, id_jabatan, nik', 'required'),
			array('branch_id, id_divisi, id_level_jabatan, id_jabatan', 'numerical', 'integerOnly'=>true),
			array('name, address, phone', 'length', 'max'=>255),
			
			array('foto', 'length', 'max'=>50),
			array('dob', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, name, dob, address, phone, branch_id, id_divisi, id_level_jabatan, id_jabatan, foto', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'nik'=> 'NIK',
			'dob' => 'Date of Birthday',
			'address' => 'Address',
			'phone' => 'Phone',
			'branch_id' => 'Branch',
			'id_divisi' => 'Divisi',
			'id_level_jabatan' => 'Level Jabatan',
			'id_jabatan' => 'Jabatan',
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
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('nik',$this->nik,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('branch_id',$this->branch_id);
		$criteria->compare('id_divisi',$this->id_divisi);
		$criteria->compare('id_level_jabatan',$this->id_level_jabatan);
		$criteria->compare('id_jabatan',$this->id_jabatan);
		$criteria->compare('foto',$this->foto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
