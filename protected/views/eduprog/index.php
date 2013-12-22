<?php
/* @var $this EduprogController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Eduprogs',
);

$this->menu=array(
	array('label'=>'Добавить ОП', 'url'=>array('create')),
	array('label'=>'Управление ОП', 'url'=>array('admin')),
);
?>

<h3>Образовательные программы</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
