<?php
/* @var $this TypeCourseElementController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Type Course Elements',
);

$this->menu=array(
	array('label'=>'Create TypeCourseElement', 'url'=>array('create')),
	array('label'=>'Manage TypeCourseElement', 'url'=>array('admin')),
);
?>

<h1>Type Course Elements</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
