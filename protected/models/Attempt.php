<?php

/**
 * This is the model class for table "{{attempt}}".
 *
 * The followings are the available columns in table '{{attempt}}':
 * @property integer $id
 * @property integer $test_id
 * @property integer $user_id
 * @property integer $cur_period_id
 * @property integer $result
 * @property string $date_passed
 *
 * The followings are the available model relations:
 * @property CurPeriod $curPeriod
 * @property Test $test
 * @property User $user
 */
class Attempt extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attempt the static model class
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
		return '{{attempt}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_id, user_id, cur_period_id, result, date_passed', 'required'),
			array('test_id, user_id, cur_period_id, result', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, test_id, user_id, cur_period_id, result, date_passed', 'safe', 'on'=>'search'),
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
			'test' => array(self::BELONGS_TO, 'Test', 'test_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'test_id' => 'Test',
			'user_id' => 'User',
			'cur_period_id' => 'Cur Period',
			'result' => 'Result',
			'date_passed' => 'Date Passed',
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
		$criteria->compare('test_id',$this->test_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('cur_period_id',$this->cur_period_id);
		$criteria->compare('result',$this->result);
		$criteria->compare('date_passed',$this->date_passed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}