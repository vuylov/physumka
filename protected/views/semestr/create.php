<?php
/* @var $this SemestrController */
/* @var $model Semestr */

$this->breadcrumbs=array(
	'Semestrs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Semestr', 'url'=>array('index')),
	array('label'=>'Manage Semestr', 'url'=>array('admin')),
);
?>

<h1>Create Semestr</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>