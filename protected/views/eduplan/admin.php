<?php
/* @var $this EduplanController */
/* @var $model Eduplan */

$this->breadcrumbs=array(
	'Учебные планы'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список УП', 'url'=>array('index')),
	array('label'=>'Создать УП', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('eduplan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление УП</h3>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'eduplan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'disease.name',
		'year_begin',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
