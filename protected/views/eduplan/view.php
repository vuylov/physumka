<?php
/* @var $this EduplanController */
/* @var $model Eduplan */

$this->breadcrumbs=array(
	'Eduplans'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список УП', 'url'=>array('index')),
	array('label'=>'Добавить УП', 'url'=>array('create')),
	array('label'=>'Обновить УП', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить УП', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление УП', 'url'=>array('admin')),
);
?>

<h3>Просмотр учебного плана </h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'disease_id',
		'year_begin',
	),
)); ?>
