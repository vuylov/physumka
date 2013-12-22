<?php
/* @var $this LectionController */
/* @var $model Lection */

$this->breadcrumbs=array(
	'Lections'=>array('index'),
	$model->name,
);

$this->menu=array(
        array('label'=>'Редактировать лекцию', 'url'=>array('update', 'id'=>$model->course_element_id)),
	array('label'=>'Список учебных элементов курса', 'url'=>array('courseElement/view', 'id'=>$model->courseElement->course->id)),
	//array('label'=>'Create Lection', 'url'=>array('create')),
);
?>

<h2>Просмотр параметров лекции "<?php echo $model->name; ?>"</h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'content:html',
		'date_created',
                'date_modified',
	),
)); ?>
