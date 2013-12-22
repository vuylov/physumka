<?php

/**
 * This is the model class for table "{{course_element}}".
 *
 * The followings are the available columns in table '{{course_element}}':
 * @property integer $id
 * @property integer $course_id
 * @property integer $type_element_id
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property TypeCourseElement $typeElement
 * @property CourseElementDepend[] $courseElementDepends
 * @property CourseElementDepend[] $courseElementDepends1
 * @property CourseProgress[] $courseProgresses
 * @property Lection[] $lections
 * @property Test[] $tests
 */
class CourseElement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CourseElement the static model class
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
		return '{{course_element}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id, type_element_id', 'required'),
			array('course_id, type_element_id, order', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, course_id, type_element_id, order', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'typeElement' => array(self::BELONGS_TO, 'TypeCourseElement', 'type_element_id'),
			'courseElementDepends' => array(self::HAS_MANY, 'CourseElementDepend', 'from_element_id'),
			'courseElementDepends1' => array(self::HAS_MANY, 'CourseElementDepend', 'depending_element_id'),
			'courseProgresses' => array(self::HAS_MANY, 'CourseProgress', 'course_element_id'),
			'lections' => array(self::HAS_MANY, 'Lection', 'course_element_id'),
			'tests' => array(self::HAS_MANY, 'Test', 'course_element_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'course_id' => 'Курс',
			'type_element_id' => 'Тип элемента',
			'order' => 'Порядок следования',
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
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('type_element_id',$this->type_element_id);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public static function loadModelElement($type, $id)
    {
        switch($type)
        {
            case 1:
                $element = Lection::model()->find('course_element_id = :id', array(':id'=>$id));
                return $element;
                break;
            case 2:
                $element = Test::model()->find('course_element_id = :id', array(':id'=>$id));
                return $element;
                break;
            default:
                return null;
        }
    }

    public function afterSave()
    {
        parent::afterSave();
        $model_name = $this->getTypeCourseElement($this->type_element_id);
        $model      = new $model_name;
        $model->course_element_id = $this->id;
        $model->save();

    }

    public function getTypeCourseElement($type)
    {
        $type = TypeCourseElement::model()->findByPk($type);
        return $type->model;
    }
}