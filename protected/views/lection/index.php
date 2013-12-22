<?php
/* @var $this LectionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lections',
);

$this->menu=array(
	array('label'=>'Create Lection', 'url'=>array('create')),
	array('label'=>'Manage Lection', 'url'=>array('admin')),
);
?>

<h1>Lections</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
