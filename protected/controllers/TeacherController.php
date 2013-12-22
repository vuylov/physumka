<?php

class TeacherController extends Controller
{
    public $layout = 'teacher_layout';

	public function actionIndex()
	{
        //get all courses by this user
        $courses = Course::model()->findAll('author_id = :a', array(':a'=>Yii::app()->user->id));

        $this->render('index', array(
            'courses' => $courses,
        ));
	}
        
        public function actionMarks()
        {
            
            $this->render('mark');
            
        }

        // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}