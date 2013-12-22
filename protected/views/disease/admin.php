<?php
/* @var $this DiseaseController */
/* @var $model Disease */

$this->breadcrumbs=array(
	'Diseases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список заболеваний', 'url'=>array('index')),
	array('label'=>'Добавить заболевание', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('disease-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление заболеваниями</h3>


<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'disease-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
