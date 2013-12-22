<?php
/* @var $this CoursePeriodController */
/* @var $model CoursePeriod */

$this->breadcrumbs=array(
	'Course Periods'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Список курсов УП', 'url'=>array('index')),
	array('label'=>'Добавить курс в УП', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('course-period-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Управление курсами учебных планов</h3>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'course-period-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'course.name',
		'curPeriod.RelatedData',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
