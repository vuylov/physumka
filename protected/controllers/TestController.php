<?php

class TestController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/teacher_layout';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
            return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('index','view', 'create','update', 'admin','delete', 'remove', 'show', 'start'),
                    'roles'=>array('Преподаватель', 'Методист', 'Администратор'),
                ),
                array('allow',
                     'actions'  => array('show', 'start'),
                     'roles'    => array('Студент')
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
            );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Test;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Test']))
		{
			$model->attributes=$_POST['Test'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Test']))
		{
			$model->attributes=$_POST['Test'];
			if($model->save())
                $this->redirect(array('view','id'=>$model->course_element_id));
                Yii::app()->end();
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionRemove($id)
	{
            $course = CourseElement::model()->findByPk($id)->course->id;
			//delete all attemtpts this test
			//Attempts::model()->findAll('test_id')
			
            $this->loadModel($id)->delete();
            CourseElement::model()->findByPk($id)->delete();

            if(!isset($_GET['ajax']))
            {
                //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                $this->redirect(array('courseElement/view','id'=>$course));
                Yii::app()->end();
            }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Test');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Test('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Test']))
			$model->attributes=$_GET['Test'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Test::model()->find('course_element_id = :id', array(':id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='test-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionShow($id)
        {
            $this->layout = '//layouts/course_layout';
            
            $model = Test::model()->findByPk($this->castToInt($id));
            //calculate passed attempts
            $user_id = Yii::app()->user->id;
            $cPeriod = CurPeriod::getCurrentPeriod($user_id);
            $qTest  = Attempt::model()->countByAttributes(array('test_id'=>$id, 'user_id'=>$user_id, 'cur_period_id'=>$cPeriod->id));
            //CVarDumper::dump($qTest, 10, true);
            $model->attempts -= $qTest;
            
            if($model->attempts <=0){
                $this->render('notAttempts', array(
                    'model' => $model
                ));
            }else{
                $this->render('show', array(
                    'model' => $model
                ));
            } 
        }
        
        /*
         * @param integer $id ID of test model
         */
        public function actionStart($id)
        {
            $this->layout = '//layouts/course_layout';
            $id = $this->castToInt($id);

            //Case when user respond on question of test ($id)
            if(Yii::app()->request->isPostRequest)
            {

                if(Yii::app()->request->getPost('question')&&Yii::app()->request->getPost('test_id')==$id)//user filled all(or at least 1) radio button
                {

                    //Get answers of student
                    $arrUserAnswers     = Yii::app()->request->getPost('question');
                    //Get valid answers from DB
                    $validKeys          = $this->getValidAnswersByTest($id);

                    //Compare valid answers and user answers. Return user failed answers
                    $arrFailedAnswers   = array_diff_assoc($validKeys, $arrUserAnswers);

                    /*
                     * Count valid answer of user
                     */

                    $testModel = Test::model()->findByPk($id);
                    $countUserValidAnswers = count($arrUserAnswers) - count($arrFailedAnswers);
                    
                    $cPeriod    = CurPeriod::getCurrentPeriod(Yii::app()->user->id);
                    //Fill attempt of student
                    $attempt                = new Attempt();
                    $attempt->test_id       = $id;
                    $attempt->user_id       = Yii::app()->user->id;
                    $attempt->cur_period_id = $cPeriod->id;
                    $attempt->result        = $countUserValidAnswers;
                    $attempt->date_passed   = date('Y-m-d H:i:s');
                    
                    if(!$attempt->save())
                        echo 'Попытка не сохранена';

                    if($countUserValidAnswers >= $testModel->ball_to_pass)//success test
                    {
                        //TODO add course progress here

                        $this->render('success', array(
                            'total_pass_score'  => $testModel->ball_to_pass,
                            'user_score'        => $countUserValidAnswers
                        ));

                        Yii::app()->end();

                    }
                    else //failed test
                    {
                        $this->render('failed', array(
                            'id'		=> $id,
                            'total_pass_score'  => $testModel->ball_to_pass,
                            'user_score'        => $countUserValidAnswers
                        ));

                        Yii::app()->end();

                    }



                }
                else //TODO perform case when no answers
                {
                    echo 'no answers, empty form';
                }
            }

            //Case default
            $questions = Question::model()->with('answers')->findAll('test_id = :id', array(':id'=>$id));

            $this->render('test', array(
                'test_id'       => $id,
                'questions' => $questions,
            ));
            
        }

        /*
         * Return array of valid answers of test
         * @param integer $id ID of test
         * @out array of valid answers
         */
        private function getValidAnswersByTest($id)
        {
            $questions = Question::model()->with(array(
                'answers'   => array(
                    'condition' => 'answers.is_correct = 1',
                )
            ))->findAll('test_id = :ti', array(':ti'=>$id));

            $rightKeys = array();

            foreach($questions as $question)
            {
                foreach($question->answers as $answer)
                {
                    $rightKeys['question_'.$question->id] = $answer->id;
                }
            }

            return $rightKeys;
        }

        private function castToInt($id)
        {
            
            $id = (int)$id;
            if(!$id || !is_int($id))
            {
                throw new CHttpException(400, 'Ошибка при передаче параметра.');
            }
            
            return $id;
        }


}
