<?php
/* @var $this GroupController */
/* @var $model Group */

$this->breadcrumbs=array(
	'Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список групп', 'url'=>array('index')),
	array('label'=>'Управление группами', 'url'=>array('admin')),
);
?>

<h3>Добавление новой группы</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>