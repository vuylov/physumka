<?php
/* @var $this EduplanController */
/* @var $model Eduplan */

$this->breadcrumbs=array(
	'Учебные планы'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список УП', 'url'=>array('index')),
	array('label'=>'Управление УП', 'url'=>array('admin')),
);
?>

<h3>Добавить УП</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>