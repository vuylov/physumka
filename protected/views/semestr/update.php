<?php
/* @var $this SemestrController */
/* @var $model Semestr */

$this->breadcrumbs=array(
	'Semestrs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Semestr', 'url'=>array('index')),
	array('label'=>'Create Semestr', 'url'=>array('create')),
	array('label'=>'View Semestr', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Semestr', 'url'=>array('admin')),
);
?>

<h1>Update Semestr <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>