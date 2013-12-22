<?php
/* @var $this CurPeriodController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cur Periods',
);

$this->menu=array(
	array('label'=>'Добавить элемент в УП', 'url'=>array('create')),
	array('label'=>'Управление структурой УП', 'url'=>array('admin')),
);
?>

<h3>Элементы структуры УП</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
