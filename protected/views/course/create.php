<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список курсов', 'url'=>array('index')),
	array('label'=>'Управление курсами', 'url'=>array('admin')),
);
?>

<h3>Добавление курса</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>