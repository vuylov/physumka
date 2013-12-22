<?php

/**
 * This is the model class for table "{{course_element_depend}}".
 *
 * The followings are the available columns in table '{{course_element_depend}}':
 * @property integer $id
 * @property integer $depending_element_id
 * @property integer $from_element_id
 *
 * The followings are the available model relations:
 * @property CourseElement $fromElement
 * @property CourseElement $dependingElement
 */
class CourseElementDepend extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseElementDepend the static model class
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
		return '{{course_element_depend}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('depending_element_id, from_element_id', 'required'),
			array('depending_element_id, from_element_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, depending_element_id, from_element_id', 'safe', 'on'=>'search'),
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
			'fromElement' => array(self::BELONGS_TO, 'CourseElement', 'from_element_id'),
			'dependingElement' => array(self::BELONGS_TO, 'CourseElement', 'depending_element_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'depending_element_id' => 'Depending Element',
			'from_element_id' => 'From Element',
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
		$criteria->compare('depending_element_id',$this->depending_element_id);
		$criteria->compare('from_element_id',$this->from_element_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}