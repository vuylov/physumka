<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Courses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список курсов', 'url'=>array('index')),
	array('label'=>'Добавить курс', 'url'=>array('create')),
	array('label'=>'Просмотр курса', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление курсами', 'url'=>array('admin')),
);
?>

<h3>Изменение курса "<?php echo $model->name; ?>"</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>