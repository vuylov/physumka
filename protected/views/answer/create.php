<?php
$this->breadcrumbs=array(
	'Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список ответов','url'=>array('index', 'question_id'=>$model->question_id)),
	//array('label'=>'Manage Answer','url'=>array('admin')),
);
?>

<h3>Создание ответа</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>