<?php
$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Список вопросов','url'=>array('index', 'test_id'=>$model->test_id)),
);
?>

<h2>Редактирование вопроса "<?php echo $model->name; ?>"</h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>