<?php

/**
 * This is the model class for table "{{lection}}".
 *
 * The followings are the available columns in table '{{lection}}':
 * @property integer $id
 * @property integer $course_element_id
 * @property string $name
 * @property string $content
 * @property string $date_created
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property CourseElement $courseElement
 */
class Lection extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Lection the static model class
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
		return '{{lection}}';
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
            array('course_element_id', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, course_element_id, name, content, date_created, date_modified', 'safe', 'on'=>'search'),
            array('content, date_created, date_modified', 'safe')
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
            'name' => 'Название лекции',
            'content' => 'Содержимое лекции',
            'date_created' => 'Дата создания',
            'date_modified' => 'Дата обновления',
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
        $criteria->compare('content',$this->content,true);
        $criteria->compare('date_created',$this->date_created,true);
        $criteria->compare('date_modified',$this->date_modified,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
	}
        
        public function beforeValidate() {
            
            //parent::beforeValidate();
            if($this->getIsNewRecord())
                $this->date_created = Date('Y-m-d');
            $this->date_modified = Date('Y-m-d');
            return true;
        }
}