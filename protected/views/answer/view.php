<?php
$this->breadcrumbs=array(
	'Answers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список ответов','url'=>array('index', 'question_id'=>$model->question_id)),
	array('label'=>'Добавить ответ','url'=>array('create', 'question_id'=>$model->question_id)),
	array('label'=>'Изменить ответ','url'=>array('update','id'=>$model->id)),
	array('label'=>'Удалить ответ','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить ответ?')),
	array('label'=>'Вернуться к вопросу','url'=>array('question/view', 'id'=>$model->question_id)),
);
?>

<h2>Просмотр ответа</h2>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'content:html',
		'is_correct',
	),
)); ?>
