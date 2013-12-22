<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Добавить группу', 'url'=>array('index')),
	array('label'=>'Создать группу', 'url'=>array('create')),
	array('label'=>'Редактировать группу', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить группу', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить группу?')),
	array('label'=>'Управление группами', 'url'=>array('admin')),
);
?>

<h3>Просмотр группы "<?php echo $model->name; ?>"</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'eduprog.name',
	),
)); ?>
