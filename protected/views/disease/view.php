<?php
/* @var $this DiseaseController */
/* @var $model Disease */

$this->breadcrumbs=array(
	'Diseases'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список заболеваний', 'url'=>array('index')),
	array('label'=>'Добавить заболевание', 'url'=>array('create')),
	array('label'=>'Изменить заболевание', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить заболевание', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление заболеваниями', 'url'=>array('admin')),
);
?>

<h3>Просмотр заболевания</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
