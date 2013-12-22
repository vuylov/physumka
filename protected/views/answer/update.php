<?php
$this->breadcrumbs=array(
	'Answers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список ответов','url'=>array('index', 'question_id'=>$model->question_id)),
	//array('label'=>'Create Answer','url'=>array('create')),
	//array('label'=>'View Answer','url'=>array('view','id'=>$model->id)),
	//array('label'=>'Manage Answer','url'=>array('admin')),
);
?>

<h2>Редактирование ответа</h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>