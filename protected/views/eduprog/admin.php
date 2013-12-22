<?php
/* @var $this EduprogController */
/* @var $model Eduprog */

$this->breadcrumbs=array(
	'Eduprogs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список ОП', 'url'=>array('index')),
	array('label'=>'Добавить ОП', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('eduprog-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление образовательными программами</h3>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'eduprog-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'year',
		'name',
		'price',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
