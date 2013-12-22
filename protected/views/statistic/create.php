<?php
/* @var $this StatisticController */
/* @var $model Statistic */

$this->breadcrumbs=array(
	'Statistics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список оценок', 'url'=>array('index')),
	array('label'=>'Управление оценками', 'url'=>array('admin')),
);
?>

<h3>Добавление оценки сданного норматива</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>