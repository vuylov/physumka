<?php
/* @var $this EduprogController */
/* @var $model Eduprog */

$this->breadcrumbs=array(
	'Eduprogs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список ОП', 'url'=>array('index')),
	array('label'=>'Добавить ОП', 'url'=>array('create')),
	array('label'=>'Изменить ОП', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить ОП', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление ОП', 'url'=>array('admin')),
);
?>

<h3>Просмотр образовательной программы <?php echo $model->name; ?></h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'year',
		'name',
		'price',
	),
)); ?>
