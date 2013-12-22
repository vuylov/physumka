<?php

/**
 * This is the model class for table "{{module}}".
 *
 * The followings are the available columns in table '{{module}}':
 * @property integer $id
 * @property string $name
 * @property integer $season_id
 * @property integer $index
 * @property integer $date_start
 * @property integer $date_end
 *
 * The followings are the available model relations:
 * @property CurPeriod[] $curPeriods
 * @property Season $season
 */
class Module extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Module the static model class
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
		return '{{module}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, season_id, index, date_start, date_end', 'required'),
			array('season_id, index, date_start, date_end', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, season_id, index, date_start, date_end', 'safe', 'on'=>'search'),
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
			'curPeriods' => array(self::HAS_MANY, 'CurPeriod', 'module_id'),
			'season' => array(self::BELONGS_TO, 'Season', 'season_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'season_id' => 'Season',
			'index' => 'Index',
			'date_start' => 'Date Start',
			'date_end' => 'Date End',
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
		$criteria->compare('season_id',$this->season_id);
		$criteria->compare('index',$this->index);
		$criteria->compare('date_start',$this->date_start);
		$criteria->compare('date_end',$this->date_end);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function getRelatedData()
    {
        return $this->name.' | '.$this->season->name;
    }
    
    public function getCurrentModule()
    {
        $now = (int)date('md');
        //$query = "SELECT m.id FROM ph_module as m WHERE m.date_start < $now and m.date_end>$now";
        $connection = Yii::app()->db;
        $command    = $connection->createCommand("SELECT m.id FROM ph_module as m WHERE m.date_start < $now and m.date_end>$now");
        $row        = $command->queryRow();

        return $row['id'];
    }
}