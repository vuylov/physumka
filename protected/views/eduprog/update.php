<?php
/* @var $this EduprogController */
/* @var $model Eduprog */

$this->breadcrumbs=array(
	'Eduprogs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список ОП', 'url'=>array('index')),
	array('label'=>'Добавить ОП', 'url'=>array('create')),
	array('label'=>'Просмотр ОП', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление ОП', 'url'=>array('admin')),
);
?>

<h3>Изменение образовательной программы "<?php echo $model->name; ?>"</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>