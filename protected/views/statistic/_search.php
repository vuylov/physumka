<?php
/* @var $this StatisticController */
/* @var $model Statistic */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_period_id'); ?>
		<?php echo $form->textField($model,'cur_period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exercise_id'); ?>
		<?php echo $form->textField($model,'exercise_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'raw_result'); ?>
		<?php echo $form->textField($model,'raw_result',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ball_result'); ?>
		<?php echo $form->textField($model,'ball_result'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->