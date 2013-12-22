<?php
/* @var $this CoursePeriodController */
/* @var $model CoursePeriod */

$this->breadcrumbs=array(
	'Course Periods'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список курсов УП', 'url'=>array('index')),
	array('label'=>'Добавить курс в УП', 'url'=>array('create')),
	array('label'=>'Изменить курс УП', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить курс УП', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление курсами УП', 'url'=>array('admin')),
);
?>

<h3>Просмотр курса учебного плана</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_id',
		'cur_period_id',
	),
)); ?>
