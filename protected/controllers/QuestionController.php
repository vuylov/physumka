<?php

class QuestionController extends Controller
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
			'accessControl', // perform access control for CRUD operations
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
                'actions'=>array('index','view', 'create','update', 'admin','delete', 'remove', 'work'),
                'roles'=>array('Преподаватель', 'Методист', 'Администратор'),
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
		$model = $this->loadModel($id);
        $this->render('view',array(
			'model'=>$model,
            'test_id' => $model->test_id
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($test_id = NULL)
	{
        $test_id = (int)$test_id;
                if(!$test_id || !is_int($test_id))
                {
                    throw new CHttpException(400, 'Не указан тест, для которого создавать вопрос');
                }
		$model=new Question;
        //fill test_id of model
        $model->test_id = $test_id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id, 'test_id'=>$test_id));
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

		if(isset($_POST['Question']))
		{
			$model->attributes=$_POST['Question'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id, 'test_id'=>$model->test_id));
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
	public function actionDelete($id)
	{

			// we only allow deletion via POST request
			$question   = $this->loadModel($id);//->delete();
            $test_id    = $question->test_id;
            $question->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                $this->redirect(array('index', 'test_id'=>$test_id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($test_id=null)
	{
                $test_id = (int)$test_id;
                if(!$test_id||!is_int($test_id))
                {
                    throw new CHttpException(400, 'Не передано значение используемого теста');
                    Yii::app()->end();
                }   

                $test_element_id = Test::model()->findByPk($test_id)->course_element_id;

                $dataProvider=new CActiveDataProvider('Question', array(
                    'criteria' => array(
                        'condition' => 'test_id='.$test_id,
                        'order'     => 'id ASC'
                    ),
                    'pagination'=>array(
                        'pageSize'  =>10,
                    ),
                ));
		$this->render('index',array(
			'dataProvider'      =>$dataProvider,
            'test_id'           => $test_id,
            'test_element_id'   => $test_element_id,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Question('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Question']))
			$model->attributes=$_GET['Question'];

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
		$model=Question::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
