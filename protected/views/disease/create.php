<?php
/* @var $this DiseaseController */
/* @var $model Disease */

$this->breadcrumbs=array(
	'Diseases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список заболеваний', 'url'=>array('index')),
	array('label'=>'Управление заболеваниями', 'url'=>array('admin')),
);
?>

<h3>Добавить заболевание</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>