<?php

class MethodistController extends Controller
{
    public $layout = 'methodist_layout';

	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionIfks()
	{
		$curPeriod = new CurPeriod;
		$user = new User;
		
		if(isset($_POST["User"])&& isset($_POST["CurPeriod"]))
		{
                        $errFlag = FALSE;
			$userId = $_POST["User"]["id"];
                        $curPeriodId = $_POST["CurPeriod"]["id"];
			                        
                        //step 1. Count index Ifz
                        $connection = Yii::app()->db;
                        $command = $connection->createCommand("
                                SELECT AVG(ball_result) as ifz
                                FROM ph_statistic
                                WHERE user_id = {$userId} and cur_period_id = {$curPeriodId}"
                                );
                        (float)$ifr = $command->queryScalar();
                        
                        if(!$ifr)
                        {
                            $ifr = 'Данных для построения индекса физической культуры нет';
                            $errFlag = true;
                        }
                        
                        //step 2. Count index Ifzn
                        $command = $connection->createCommand("
                                SELECT test_id, max(result) as max_b, ph_test.ball_to_pass as get_b
                                FROM `ph_attempt`
                                INNER JOIN ph_test ON ph_test.id = ph_attempt.test_id
                                WHERE {$userId} and cur_period_id = {$curPeriodId}
                                GROUP BY test_id
                            ");
                        $ifz = $command->queryAll(true);
                        
                        if(!$ifz){
                            $ifzn = 'Данных для построения индекса физической культуры нет';
                            $errFlag = true;
                        }
                        else
                        {
                            //var_dump($ifz);
                            $max_b = 0;
                            $real_b = 0;

                            foreach($ifz as $arr){
                                $max_b +=$arr["max_b"];
                                $real_b +=$arr["get_b"];
                            }
                            $ifzn = round($real_b / $max_b, 4);
                        }
                            
                        //step 3. Count Iinv
                        //HZ KAK???
                        $ifinv = 0.15;
                        
                        //step 4. Count total
                        if($errFlag){//if set
                            $iftotal = 'Не все индексы рассчитаны';
                        }
                        else{     
                            $iftotal = $ifr + $ifzn + $ifinv;
                        }
                        
			//TODO make statistic
			$html = '<table class="table"><tr><th>Индекс физического развития (Ifr)</th><th>Индекс уровня знанний (Izn)</th><th>Индекс инвестиций (Iinv)</th><th>Сводный индекс ФКС</th></tr>';
			$html.='<tr><td>'.$ifr.'</td><td>'.$ifzn.'</td><td>'.$ifinv.'</td><td>'.$iftotal.'</td></tr></table>';
			
			$this->render('ifks', array(
                                'curPeriod'=> $curPeriod,
				'user'  => $user,
				'html'	=> $html
			));
		}
		else
		{
			$html = '';
			$this->render('ifks', array(
                                'curPeriod' => $curPeriod,
				'user' => $user,
				'html'	=> $html
			));
		}
	}
        
        /*
         * Test action for checking
         */
        public function actionTestAttempt()
        {
            $attempt = new Attempt();
            $attempt->user_id = 5;
            $attempt->test_id = 3;
            //$attempt->cur_period_id = 1;
            $attempt->result = 10;
            $attempt->date_passed = '2013-09-22';
            
            if(!$attempt->save())
                echo 'Record not added';
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