<?php

/**
 * This is the model class for table "{{test}}".
 *
 * The followings are the available columns in table '{{test}}':
 * @property integer $id
 * @property integer $course_element_id
 * @property string $name
 * @property integer $attempts
 * @property integer $ball_to_pass
 *
 * The followings are the available model relations:
 * @property Attempt[] $attempts0
 * @property Question[] $questions
 * @property CourseElement $courseElement
 */
class Test extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Test the static model class
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
		return '{{test}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_element_id', 'required'),
			array('course_element_id, attempts, ball_to_pass', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_element_id, name, attempts, ball_to_pass', 'safe', 'on'=>'search'),
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
			'attempts0' => array(self::HAS_MANY, 'Attempt', 'test_id'),
			'questions' => array(self::HAS_MANY, 'Question', 'test_id'),
			'courseElement' => array(self::BELONGS_TO, 'CourseElement', 'course_element_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'course_element_id' => 'Номер элемента курса',
			'name' => 'Название теста',
			'attempts' => 'Количество попыток',
			'ball_to_pass' => 'Количество правильных ответов, при которых тест считается пройденным',
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
		$criteria->compare('course_element_id',$this->course_element_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('attempts',$this->attempts);
		$criteria->compare('ball_to_pass',$this->ball_to_pass);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}