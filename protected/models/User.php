<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $numbook
 * @property string $password
 * @property string $date_registration
 * @property string $date_admission
 * @property integer $group_id
 * @property integer $disease_id
 * @property integer $role_id
 *
 * The followings are the available model relations:
 * @property Attempt[] $attempts
 * @property Course[] $courses
 * @property CourseProgress[] $courseProgresses
 * @property Statistic[] $statistics
 * @property Disease $disease
 * @property Group $group
 * @property Role $role
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numbook, password, date_registration, role_id', 'required'),
			array('group_id, disease_id, role_id', 'numerical', 'integerOnly'=>true),
			array('numbook, password', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, numbook, password, date_registration, date_admission, group_id, disease_id, role_id', 'safe', 'on'=>'search'),
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
			'attempts' => array(self::HAS_MANY, 'Attempt', 'user_id'),
			'courses' => array(self::HAS_MANY, 'Course', 'author_id'),
			'courseProgresses' => array(self::HAS_MANY, 'CourseProgress', 'user_id'),
			'statistics' => array(self::HAS_MANY, 'Statistic', 'user_id'),
			'disease' => array(self::BELONGS_TO, 'Disease', 'disease_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numbook' => 'Номер зачетной книжки',
			'password' => 'Пароль',
			'date_registration' => 'Дата регистрации',
                        'date_admission'    => 'Год поступления',
			'group_id' => 'Группа',
			'disease_id' => 'Тип болезни',
			'role_id' => 'Роль',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('numbook',$this->numbook,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('date_registration',$this->date_registration,true);
        $criteria->compare('date_admission',$this->date_admission,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('disease_id',$this->disease_id);
		$criteria->compare('role_id',$this->role_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function beforeSave()
    {
        $this->password = md5($this->password);
        return parent::beforeSave();
    }
}