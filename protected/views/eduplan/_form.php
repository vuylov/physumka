<?php
/* @var $this EduplanController */
/* @var $model Eduplan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'eduplan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class'=>'span7')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disease_id'); ?>
		<?php echo $form->dropDownList($model,
                                    'disease_id',
                                    CHtml::listData(Disease::model()->findAll(), 'id', 'name'),
                                    array(
                                        'prompt' => 'Выберите тип заболевания',
                                        'class'  => 'span7'
                                    )
                                    ); ?>
		<?php echo $form->error($model, 'disease_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_begin'); ?>
		<?php echo $form->textField($model,'year_begin', array('class'=>'span7')); ?>
		<?php echo $form->error($model,'year_begin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->