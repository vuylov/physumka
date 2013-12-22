<?php
/* @var $this TypeCourseElementController */
/* @var $model TypeCourseElement */

$this->breadcrumbs=array(
	'Type Course Elements'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TypeCourseElement', 'url'=>array('index')),
	array('label'=>'Manage TypeCourseElement', 'url'=>array('admin')),
);
?>

<h1>Create TypeCourseElement</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>