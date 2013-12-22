<?php
$this->breadcrumbs=array(
	'Tests'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Вопросы теста','url'=>array('question/index', 'test_id'=>$model->id)),
	array('label'=>'Добавить вопрос','url'=>array('question/create', 'test_id'=>$model->id)),
	array('label'=>'Просмотр параметров теста','url'=>array('view','id'=>$model->course_element_id)),
        array('label'=>'Список учебных элементов курса', 'url'=>array('courseElement/view', 'id'=>$model->courseElement->course->id)),
);
?>

<h3>Изменение теста</h3>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>