<?php
/* @var $this CurPeriodController */
/* @var $model CurPeriod */
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
		<?php echo $form->label($model,'eduplan_id'); ?>
		<?php echo $form->textField($model,'eduplan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semestr_id'); ?>
		<?php echo $form->textField($model,'semestr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'module_id'); ?>
		<?php echo $form->textField($model,'module_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->