<?php
/* @var $this CourseElementController */
/* @var $model CourseElement */

/*$this->breadcrumbs=array(
	'Course Elements'=>array('index'),
	$model->id,
);*/

$this->menu=array(
	//array('label'=>'List CourseElement', 'url'=>array('index')),
	array('label'=>'Добавить учебный элемент в курс', 'url'=>array('create', 'id'=>$course->id)),
	//array('label'=>'Редак', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete CourseElement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage CourseElement', 'url'=>array('admin')),
);
?>

<h2>Список элементов курса "<?php echo $course->name; ?>"</h2>
<?php

        echo "<table class='table table-striped'>";
        echo "<tr><th>Название учебного элемента</th><th>Управление</th></tr>";
        foreach($models as $model)
        {
            echo '<tr><td>'.$model->name.'</td><td><a class="btn btn-primary btn-small" href="'.$this->createUrl(strtolower(get_class($model)).'/view', array('id'=>$model->course_element_id)).'">Просмотр</a>&nbsp;<a class="btn btn-primary btn-small" href="'.$this->createUrl(strtolower(get_class($model)).'/update', array('id'=>$model->course_element_id)).'">Редактировать</a>&nbsp;<a class="btn btn-primary btn-small" href="'.$this->createUrl(strtolower(get_class($model)).'/remove', array('id'=>$model->course_element_id)).'">Удалить</a></td></tr>';
        }
        echo '</table>';
?>