<?php
/* @var $this StatisticController */
/* @var $model Statistic */

$this->breadcrumbs=array(
	'Statistics'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список оценок', 'url'=>array('index')),
	array('label'=>'Добавить оценку', 'url'=>array('create')),
	array('label'=>'Редактировать оценку', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить оценку', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление оценками', 'url'=>array('admin')),
);
?>

<h3>Просмотр оценки</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user.numbook',
		'cur_period_id',
		'exercise_id',
		'raw_result',
		'ball_result',
	),
)); ?>
