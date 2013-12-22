<?php
/* @var $this EduprogController */
/* @var $model Eduprog */

$this->breadcrumbs=array(
	'Eduprogs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список ОП', 'url'=>array('index')),
	array('label'=>'Управление ОП', 'url'=>array('admin')),
);
?>

<h3>Добавить образовательную программу</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>