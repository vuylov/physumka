<?php
/* @var $this StudentController */

$this->breadcrumbs=array(
	'Student',
);

?>
    <table class="table table-striped">
        <tr><th>#</th><th>Название дисциплины</th></tr>
        <?php
            if(!$courses)
            {
                echo '<tr><td>Не доступных курсов в этом модуле</td></tr>';
            }
            else
            {
                $i = 1; //use for number of #string
                foreach($courses as $course)
                {
                    echo '<tr><td>'.$i.'</td><td><a href="'.$this->createUrl('course/show', array('id'=>$course->id)).'">'.$course->name.'</a></td></tr>';
                    $i++;
                }
            }
        ?>
    </table>

