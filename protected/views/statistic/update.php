<?php
/* @var $this StatisticController */
/* @var $model Statistic */

$this->breadcrumbs=array(
	'Statistics'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список оценок', 'url'=>array('index')),
	array('label'=>'Добавить оценку', 'url'=>array('create')),
	array('label'=>'Просмотр оценки', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление оценками', 'url'=>array('admin')),
);
?>

<h3>Редактирование оценки</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>