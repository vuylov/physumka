<?php
/* @var $this CoursePeriodController */
/* @var $model CoursePeriod */

$this->breadcrumbs=array(
	'Course Periods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список курсов УП', 'url'=>array('index')),
	array('label'=>'Добавить курс в УП', 'url'=>array('create')),
	array('label'=>'Просмотр курса УП', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление курсами УП', 'url'=>array('admin')),
);
?>

<h3>Изменение курса учебного плана</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>