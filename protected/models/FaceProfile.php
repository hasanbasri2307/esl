<?php

/**
 * This is the model class for table "{{face_profile}}".
 *
 * The followings are the available columns in table '{{face_profile}}':
 * @property integer $faceprofile_id
 * @property integer $client_id
 * @property string $problems
 * @property string $skintexture_grade
 * @property string $skintexture_level
 * @property string $pigmentation_grade
 * @property string $pigmentation_level
 * @property string $sebum_grade
 * @property string $sebum_level
 * @property string $skintone_grade
 * @property string $skintone_level
 * @property string $pores_grade
 * @property string $pores_level
 * @property string $eyewrinkles_grade
 * @property string $eyewrinkles_level
 * @property string $level_skin_type
 * @property string $level_skin_problem
 * @property integer $user_id
 */
class FaceProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{face_profile}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_id, problems,, user_id', 'required'),
			array('client_id, user_id', 'numerical', 'integerOnly'=>true),
			array('skintexture_grade, skintexture_level, pigmentation_grade, pigmentation_level, sebum_grade, sebum_level, skintone_grade, skintone_level, pores_grade, pores_level, eyewrinkles_grade, eyewrinkles_level, level_skin_type, level_skin_problem', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('faceprofile_id, client_id, problems, skintexture_grade, skintexture_level, pigmentation_grade, pigmentation_level, sebum_grade, sebum_level, skintone_grade, skintone_level, pores_grade, pores_level, eyewrinkles_grade, eyewrinkles_level, level_skin_type, level_skin_problem, user_id', 'safe', 'on'=>'search'),
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
			'faceprofile_id' => 'Faceprofile',
			'client_id' => 'Client',
			'problems' => 'Problems',
			'skintexture_grade' => 'Skintexture Grade',
			'skintexture_level' => 'Skintexture Level',
			'pigmentation_grade' => 'Pigmentation Grade',
			'pigmentation_level' => 'Pigmentation Level',
			'sebum_grade' => 'Sebum Grade',
			'sebum_level' => 'Sebum Level',
			'skintone_grade' => 'Skintone Grade',
			'skintone_level' => 'Skintone Level',
			'pores_grade' => 'Pores Grade',
			'pores_level' => 'Pores Level',
			'eyewrinkles_grade' => 'Eyewrinkles Grade',
			'eyewrinkles_level' => 'Eyewrinkles Level',
			'level_skin_type' => 'Level Skin Type',
			'level_skin_problem' => 'Level Skin Problem',
			'user_id' => 'User',
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

		$criteria->compare('faceprofile_id',$this->faceprofile_id);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('problems',$this->problems,true);
		$criteria->compare('skintexture_grade',$this->skintexture_grade,true);
		$criteria->compare('skintexture_level',$this->skintexture_level,true);
		$criteria->compare('pigmentation_grade',$this->pigmentation_grade,true);
		$criteria->compare('pigmentation_level',$this->pigmentation_level,true);
		$criteria->compare('sebum_grade',$this->sebum_grade,true);
		$criteria->compare('sebum_level',$this->sebum_level,true);
		$criteria->compare('skintone_grade',$this->skintone_grade,true);
		$criteria->compare('skintone_level',$this->skintone_level,true);
		$criteria->compare('pores_grade',$this->pores_grade,true);
		$criteria->compare('pores_level',$this->pores_level,true);
		$criteria->compare('eyewrinkles_grade',$this->eyewrinkles_grade,true);
		$criteria->compare('eyewrinkles_level',$this->eyewrinkles_level,true);
		$criteria->compare('level_skin_type',$this->level_skin_type,true);
		$criteria->compare('level_skin_problem',$this->level_skin_problem,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FaceProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
