<?php

class StudentController extends Controller
{
    public $layout = 'student_layout';

	public function actionIndex()
	{
        /**
         * 1. Получить данные о студенте
         * 2. На основании типа болезни студента выбрать:
         *      2.1  Учебный план
         *      2.2. Текущий семестр
         *      2.3. Текущий модуль
         * 3. Выбрать курсы для его текущего УП
         */
        //bubububububugggg
        if(empty(Yii::app()->user->id))
            Yii::app()->user->id = 5;
        
        $user       = User::model()->findByPk(Yii::app()->user->id);
        $eduplan    = Eduplan::model()->find('disease_id=?', array($user->disease_id));
        //get semestr
        $sem    = new Semestr();
        $semestr = $sem->getCurrentSemestr($user);
        //get module
        $module = new Module();
        $module_id     = $module->getCurrentModule();
        
        /*
        echo $module_id;
        echo $semestr;
        echo $eduplan->id;
        exit;*/
        
        // get id of structure education plan
        $element   = CurPeriod::model()->find('eduplan_id = :e AND semestr_id = :s AND module_id = :m', array(':e'=>$eduplan->id, ':s'=>$semestr, ':m'=>$module_id));
        
        //Делаем костыль, если вдруг не заполнен УЧ-план
        if(empty($element))
        {
          //  echo 'bingo';
          $element = new CurPeriod();
          $element->id = 8;//для это периода есть курсы по легкой атлетике и волейболу
        }
        //конец костыля
        
        //get id courses of this module+semestr+eduplan
        $now_courses = CoursePeriod::model()->findAll('cur_period_id = :c', array(':c'=>$element->id));
		

        $courses = array();
        //get data for AR-array of courses
        foreach($now_courses as $course)
        {
            $courses[] = Course::model()->findByPk($course->course_id);
        }

		//default page for login user with student role
        $this->render('index', array(
            'user'    => $user,
            'courses' => $courses,
        ));
	}

    public function actionEduplan()
    {
        $this->render('eduplan');
    }

    public function actionMarks()
    {

        $user = Yii::app()->user->id;

        $normatives = Statistic::model()->with('exercise')->findAll('user_id = :user', array(':user'=>$user));

        $this->render('marks', array(
            //'user' => $user,
            'normatives' => $normatives
        ));
    }

	// Uncomment the following methods and override them if needed
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			//'accessControl'
		);
	}

    public function accessRules()
    {
        return array(
            
            array('deny',
                'actions'   => array('index', 'eduplan', 'marks'),
                'users'      => array('*'),
            ),
            array('allow',
                'actions'   => array('index', 'eduplan', 'marks'),
                'roles'     => array('Студент', 'Администратор'),

            ),
        );
    }
 /*
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