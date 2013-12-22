<?php
/* @var $this EduplanController */
/* @var $model Eduplan */

$this->breadcrumbs=array(
	'Eduplans'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список УП', 'url'=>array('index')),
	array('label'=>'Создать УП', 'url'=>array('create')),
	array('label'=>'Просмотр УП', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление УП', 'url'=>array('admin')),
);
?>

<h1>Изменение УП <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>