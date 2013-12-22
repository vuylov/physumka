<?php

/**
 * This is the model class for table "{{statistic}}".
 *
 * The followings are the available columns in table '{{statistic}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $cur_period_id
 * @property integer $exercise_id
 * @property string $raw_result
 * @property integer $ball_result
 *
 * The followings are the available model relations:
 * @property CurPeriod $curPeriod
 * @property Exercise $exercise
 * @property User $user
 */
class Statistic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Statistic the static model class
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
		return '{{statistic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, cur_period_id, exercise_id, raw_result', 'required'),
			array('user_id, cur_period_id, exercise_id, ball_result', 'numerical', 'integerOnly'=>true),
			array('raw_result', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, cur_period_id, exercise_id, raw_result, ball_result', 'safe', 'on'=>'search'),
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
			'curPeriod' => array(self::BELONGS_TO, 'CurPeriod', 'cur_period_id'),
			'exercise' => array(self::BELONGS_TO, 'Exercise', 'exercise_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер',
			'user_id' => 'Студент',
			'cur_period_id' => 'Учебный модуль',
			'exercise_id' => 'Упражнение',
			'raw_result' => 'Результат',
			'ball_result' => 'Оценка в баллах',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('cur_period_id',$this->cur_period_id);
		$criteria->compare('exercise_id',$this->exercise_id);
		$criteria->compare('raw_result',$this->raw_result,true);
		$criteria->compare('ball_result',$this->ball_result);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}