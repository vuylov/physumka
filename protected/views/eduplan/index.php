<?php
/* @var $this EduplanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Учебные планы',
);

$this->menu=array(
	array('label'=>'Добавить УП', 'url'=>array('create')),
	array('label'=>'Управление УП', 'url'=>array('admin')),
);
?>

<h3>Учебные планы</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
