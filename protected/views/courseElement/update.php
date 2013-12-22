<?php
/* @var $this CourseElementController */
/* @var $model CourseElement */

$this->breadcrumbs=array(
	'Course Elements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CourseElement', 'url'=>array('index')),
	array('label'=>'Create CourseElement', 'url'=>array('create')),
	array('label'=>'View CourseElement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CourseElement', 'url'=>array('admin')),
);
?>

<h1>Update CourseElement <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>