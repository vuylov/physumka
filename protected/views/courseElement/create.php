<?php
/* @var $this CourseElementController */
/* @var $model CourseElement */

$this->breadcrumbs=array(
	'Course Elements'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'Список учебных элементов', 'url'=>array('index')),
	//array('label'=>'Управление учебными элементами', 'url'=>array('admin')),
);
?>

<h1>Создание учебного элемента</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>