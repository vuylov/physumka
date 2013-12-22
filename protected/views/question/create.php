<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Список вопросов','url'=>array('index', 'test_id'=>$model->test_id)),
	//array('label'=>'Manage Question','url'=>array('admin')),
);
?>

<h3>Создание вопроса для теста</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>