<?php
/* @var $this TeacherController */

$this->breadcrumbs=array(
	'Teacher',
);
?>
<table class="table table-striped">
    <tr><th>Название курса</th></tr>
    <?php
        if(!$courses)
        {
            echo '<tr><td>У Вас нет доступных курсов для заполнения. Обратитесь к методисту кафедры</td></tr>';
        }
        else 
        {
            foreach($courses as $course)
            {
                echo '<tr><td><a href="'.$this->createUrl('courseElement/view', array('id'=>$course->id)).'">'.$course->name.'</a></td></tr>';
            }
        }   
    ?>
</table>