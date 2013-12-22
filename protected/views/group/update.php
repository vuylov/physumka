<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список групп', 'url'=>array('index')),
	array('label'=>'Добавить группу', 'url'=>array('create')),
	array('label'=>'Просмотр группы', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление группами', 'url'=>array('admin')),
);
?>

<h3>Изменение группы "<?php echo $model->name; ?>"</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>