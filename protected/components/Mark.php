<?php
class Mark {
    
    public static function getCourseWithTestMarks($curPeriod, $userId){
        
        $result = array();
        $now_courses = CoursePeriod::model()->with('course')->findAll('cur_period_id = :c', array(':c'=>$curPeriod));
        
    }
    
}
