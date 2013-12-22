<?php
/* @var $this CurPeriodController */
/* @var $model CurPeriod */

$this->breadcrumbs=array(
	'Элементы УП'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список элементов УП', 'url'=>array('index')),
	array('label'=>'Управление элементами УП', 'url'=>array('admin')),
);
?>

<h3>Добавить элемент УП</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>