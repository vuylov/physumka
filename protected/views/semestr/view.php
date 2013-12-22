<?php
/* @var $this SemestrController */
/* @var $model Semestr */

$this->breadcrumbs=array(
	'Semestrs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Semestr', 'url'=>array('index')),
	array('label'=>'Create Semestr', 'url'=>array('create')),
	array('label'=>'Update Semestr', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Semestr', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Semestr', 'url'=>array('admin')),
);
?>

<h1>View Semestr #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
