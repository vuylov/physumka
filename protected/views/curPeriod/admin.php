<?php
/* @var $this CurPeriodController */
/* @var $model CurPeriod */

$this->breadcrumbs=array(
	'Cur Periods'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список элементов структуры УП', 'url'=>array('index')),
	array('label'=>'Добавить элемент в УП', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cur-period-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление структурой учебного плана</h3>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cur-period-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'eduplan.name',
		'semestr.name',
		'module.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
