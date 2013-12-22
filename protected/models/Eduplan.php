<?php

/**
 * This is the model class for table "{{eduplan}}".
 *
 * The followings are the available columns in table '{{eduplan}}':
 * @property integer $id
 * @property string $name
 * @property integer $disease_id
 * @property string $year_begin
 *
 * The followings are the available model relations:
 * @property CurPeriod[] $curPeriods
 * @property Disease $desease
 */
class Eduplan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Eduplan the static model class
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
		return '{{eduplan}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, disease_id, year_begin', 'required'),
			array('disease_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, disease_id, year_begin', 'safe', 'on'=>'search'),
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
			'curPeriods' => array(self::HAS_MANY, 'CurPeriod', 'eduplan_id'),
			'disease' => array(self::BELONGS_TO, 'Disease', 'disease_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название УП',
			'disease_id' => 'Тип заболевания',
			'year_begin' => 'Год создания',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('disease_id',$this->disease_id);
		$criteria->compare('year_begin',$this->year_begin,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}