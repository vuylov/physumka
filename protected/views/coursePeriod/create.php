<?php
/* @var $this CoursePeriodController */
/* @var $model CoursePeriod */

$this->breadcrumbs=array(
	'Course Periods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список курсов в УП', 'url'=>array('index')),
	array('label'=>'Управление курсами УП', 'url'=>array('admin')),
);
?>

<h3>Добавить курс в учебный план</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>