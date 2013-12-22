<?php
/* @var $this CoursePeriodController */
/* @var $model CoursePeriod */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course_id'); ?>
        <?php echo $form->dropDownList($model, 'course_id',
                            CHtml::listData(Course::model()->findAll(), 'id', 'name'),
                            array('prompt' => 'Выберите курс', 'class'=>'span7'));
        ?>
		<?php echo $form->error($model,'course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_period_id'); ?>
        <?php
              echo $form->dropDownList($model, 'cur_period_id',
                            CHtml::listData(CurPeriod::model()->findAll(), 'id', 'RelatedData'),
                            array('prompt'=>'Выберите элемент УП', 'class'=>'span7'));
        ?>
		<?php echo $form->error($model,'cur_period_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->