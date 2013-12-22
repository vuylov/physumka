<?php
/* @var $this GroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Groups',
);

$this->menu=array(
	array('label'=>'Добавить группу', 'url'=>array('create')),
	array('label'=>'Управление группами', 'url'=>array('admin')),
);
?>

<h3>Группы</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'template' => "{items}\n{pager}"
)); ?>
