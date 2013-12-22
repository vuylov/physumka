<?php
class Mark {
    
    public static function getCourseWithTestMarks($curPeriod, $userId){
        
        $courses = array();
        $now_courses = CoursePeriod::model()->with('course')->findAll('cur_period_id = :c', array(':c'=>$curPeriod));
        
        foreach ($now_courses as $cP) {
            array_push($courses, $cP->course->id);
        }
        
        foreach ($courses as $course)
        {
            //CourseElement::model()->
        }
    }
    
}
