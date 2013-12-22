<?php
/* @var $this LectionController */
/* @var $model Lection */

$this->breadcrumbs=array(
	'Lections'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список лекций', 'url'=>array('index')),
	array('label'=>'Управление лекциями', 'url'=>array('admin')),
);
?>

<h3>Добавить лекцию</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>