<?php
/* @var $this CurPeriodController */
/* @var $model CurPeriod */

$this->breadcrumbs=array(
	'Cur Periods'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список элементов УП', 'url'=>array('index')),
	array('label'=>'Добавить элемент в УП', 'url'=>array('create')),
	array('label'=>'Изменить структуру УП', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить элемент УП', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление структурой УП', 'url'=>array('admin')),
);
?>

<h3>Просмотр элемента структуры учебного плана</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'eduplan.name',
		'semestr_id',
		'module_id',
	),
)); ?>
