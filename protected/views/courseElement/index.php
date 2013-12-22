<?php
/* @var $this CourseElementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Course Elements',
);

$this->menu=array(
	array('label'=>'Добавить учебный элемент', 'url'=>array('create')),
	array('label'=>'Управление учебными элементами', 'url'=>array('admin')),
);
?>

<h1>Учебные элементы курса</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
