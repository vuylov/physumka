<?php
/* @var $this LectionController */
/* @var $model Lection */

$this->breadcrumbs=array(
	'Lections'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

/*$this->menu=array(
	array('label'=>'List Lection', 'url'=>array('index')),
	array('label'=>'Create Lection', 'url'=>array('create')),
	array('label'=>'View Lection', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Lection', 'url'=>array('admin')),
);*/
?>

<div class="row">
    <div class="span-12">
        <h2>Обновление информации о лекции</h2>
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>