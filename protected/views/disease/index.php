<?php
/* @var $this DiseaseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Diseases',
);

$this->menu=array(
	array('label'=>'Добавить заболевание', 'url'=>array('create')),
	array('label'=>'Управление заболеваниями', 'url'=>array('admin')),
);
?>

<h3>Типы заболеваний</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
