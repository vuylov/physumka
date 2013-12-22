<?php
/* @var $this StatisticController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Statistics',
);

$this->menu=array(
	array('label'=>'Добавить оценку', 'url'=>array('create')),
	array('label'=>'Управление оценками', 'url'=>array('admin')),
);
?>

<h3>Оценка сдачи нормативов</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
