<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'Редактировать параметры теста','url'=>array('update','id'=>$model->course_element_id)),
    array('label'=>'Вопросы теста','url'=>array('question/index', 'test_id'=>$model->id)),
    array('label'=>'Добавить вопрос','url'=>array('question/create', 'test_id'=>$model->id)),
    array('label'=>'Список учебных элементов курса', 'url'=>array('courseElement/view', 'id'=>$model->courseElement->course->id)),
	//array('label'=>'Delete Test','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h3>Просмотр параметров теста "<?php echo $model->name; ?>"</h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'attempts',
		'ball_to_pass',
	),
)); ?>
