<?php
/* @var $this DiseaseController */
/* @var $model Disease */

$this->breadcrumbs=array(
	'Diseases'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменение',
);

$this->menu=array(
	array('label'=>'Список заболеваний', 'url'=>array('index')),
	array('label'=>'Создать новое заболевание', 'url'=>array('create')),
	array('label'=>'Просмотреть заболевание', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление типами заболеваний', 'url'=>array('admin')),
);
?>

<h3>Изменить заболевание </h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>