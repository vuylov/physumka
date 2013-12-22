<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список вопросов','url'=>array('index', 'test_id'=>$test_id)),
	array('label'=>'Добавить вопрос','url'=>array('create', 'test_id'=>$test_id)),
	array('label'=>'Редактировать вопрос','url'=>array('update','id'=>$model->id)),
	array('label'=>'Удалить вопрос','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить вопрос?')),
    array('label'=>'Добавить ответ','url'=>array('answer/create','question_id'=>$model->id)),
    array('label'=>'Список ответотв','url'=>array('answer/index','question_id'=>$model->id)),

);
?>

<h2>Просмотр параметров вопроса "<?php echo $model->name; ?>"</h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'content:html',
	),
)); ?>
