<?php
/* @var $this CoursePeriodController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Course Periods',
);

$this->menu=array(
	array('label'=>'Добавить курс к УП', 'url'=>array('create')),
	array('label'=>'Управление курсами УП', 'url'=>array('admin')),
);
?>

<h3>Курсы учебных планов</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
