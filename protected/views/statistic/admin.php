<?php
/* @var $this StatisticController */
/* @var $model Statistic */

$this->breadcrumbs=array(
	'Statistics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список оценок', 'url'=>array('index')),
	array('label'=>'Добавить оценку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('statistic-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление оценками</h3>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'statistic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user.numbook',
		'cur_period_id',
		'exercise.name',
		'raw_result',
		'ball_result',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
