<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courses',
);

$this->menu=array(
	array('label'=>'Добавить курс', 'url'=>array('create')),
	array('label'=>'Управление курсами', 'url'=>array('admin')),
);
?>

<h3>Курсы системы</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
