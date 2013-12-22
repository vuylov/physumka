<?php

/**
 * This is the model class for table "{{cur_period}}".
 *
 * The followings are the available columns in table '{{cur_period}}':
 * @property integer $id
 * @property integer $eduplan_id
 * @property integer $semestr_id
 * @property integer $module_id
 *
 * The followings are the available model relations:
 * @property CoursePeriod[] $coursePeriods
 * @property Eduplan $eduplan
 * @property Module $module
 * @property Semestr $semestr
 * @property Statistic[] $statistics
 */
class CurPeriod extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CurPeriod the static model class
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
		return '{{cur_period}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eduplan_id, semestr_id, module_id', 'required'),
			array('eduplan_id, semestr_id, module_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, eduplan_id, semestr_id, module_id', 'safe', 'on'=>'search'),
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
			'coursePeriods' => array(self::HAS_MANY, 'CoursePeriod', 'cur_period_id'),
			'eduplan' => array(self::BELONGS_TO, 'Eduplan', 'eduplan_id'),
			'module' => array(self::BELONGS_TO, 'Module', 'module_id'),
			'semestr' => array(self::BELONGS_TO, 'Semestr', 'semestr_id'),
			'statistics' => array(self::HAS_MANY, 'Statistic', 'cur_period_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'eduplan_id' => 'Учебный план',
			'semestr_id' => 'Семестр',
			'module_id' => 'Модуль',
            'RelatedData' => 'Данные учебного плана',
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
		$criteria->compare('eduplan_id',$this->eduplan_id);
		$criteria->compare('semestr_id',$this->semestr_id);
		$criteria->compare('module_id',$this->module_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return string of related with model data
     */
    public function getRelatedData()
    {
        return $this->module->name.' | '.$this->semestr->name.' | '.$this->eduplan->name;
    }
    
       public static function getCurrentPeriod($userId)
        {
            $user       = User::model()->findByPk($userId);
            $eduplan    = Eduplan::model()->find('disease_id=?', array($user->disease_id));
            //get semestr
            $sem    = new Semestr();
            $semestr = $sem->getCurrentSemestr($user);
            //get module
            $module = new Module();
            $module_id     = $module->getCurrentModule();

            $year = $user->date_admission;
            if(!$year)
                throw new CHttpException(404, "Ошибка в учебном плане. Не заполнен год поступления. Обратитесь к методисту кафедры");
            $element   = CurPeriod::model()->find('eduplan_id = :e AND semestr_id = :s AND module_id = :m', array(':e'=>$eduplan->id, ':s'=>$semestr, ':m'=>$module_id));
            return $element;
        }
}