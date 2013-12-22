<?php
/* @var $this SemestrController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Semestrs',
);

$this->menu=array(
	array('label'=>'Create Semestr', 'url'=>array('create')),
	array('label'=>'Manage Semestr', 'url'=>array('admin')),
);
?>

<h1>Semestrs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
