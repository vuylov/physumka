<?php
/* @var $this CurPeriodController */
/* @var $model CurPeriod */

$this->breadcrumbs=array(
	'Cur Periods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список элементов УП', 'url'=>array('index')),
	array('label'=>'Добавить элемент в УП', 'url'=>array('create')),
	array('label'=>'Просмотр элемента УП', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление УП', 'url'=>array('admin')),
);
?>

<h3>Изменение элемента структуры учебного плана</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>