<?php
class Mark {
    
    public static function getCourseWithTestMarks($curPeriod, $userId){
        $connection = Yii::app()->db;
        
        $sql = "SELECT c.name, t.id, t.name, t.ball_to_pass, max(at.result) as best_result, DATE(at.date_passed) as date  FROM `ph_course_period` as cp
                INNER JOIN ph_course as c ON c.id = cp.course_id
                INNER JOIN ph_course_element as ce ON ce.course_id = c.id
                INNER JOIN ph_test as t ON ce.id = t.course_element_id
                LEFT JOIN ph_attempt as at ON at.test_id = t.id and at.user_id = {$userId}
                WHERE cp.cur_period_id ={$curPeriod} and ce.type_element_id =2 
                GROUP BY t.name
                ORDER BY c.name, ce.order";
        $command    = $connection->createCommand($sql);
        return $dataReader = $command->queryAll(true);
    }
}
