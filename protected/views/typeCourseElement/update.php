<?php
/* @var $this TypeCourseElementController */
/* @var $model TypeCourseElement */

$this->breadcrumbs=array(
	'Type Course Elements'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TypeCourseElement', 'url'=>array('index')),
	array('label'=>'Create TypeCourseElement', 'url'=>array('create')),
	array('label'=>'View TypeCourseElement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TypeCourseElement', 'url'=>array('admin')),
);
?>

<h1>Update TypeCourseElement <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>