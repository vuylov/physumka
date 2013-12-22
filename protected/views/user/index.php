<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Добавить пользователя', 'url'=>array('create')),
	array('label'=>'Управление пользователями', 'url'=>array('admin')),
);
?>

<h3>Пользователи системы</h3>

<?php

    $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
  ?>
