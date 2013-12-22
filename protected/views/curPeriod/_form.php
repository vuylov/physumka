<?php
/* @var $this CurPeriodController */
/* @var $model CurPeriod */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cur-period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, помечанные <span class="required">*</span>, необходимы для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'eduplan_id'); ?>
        <?php
              echo $form->dropDownList($model,
                            'eduplan_id',
                            CHtml::listData(Eduplan::model()->findAll(), 'id', 'name'),
                            array('prompt' => 'Выберите учебный план'));
        ?>
		<?php echo $form->error($model,'eduplan_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semestr_id'); ?>
        <?php
            echo $form->dropDownList($model,
                                'semestr_id',
                                CHtml::listData(Semestr::model()->findAll(), 'id', 'name'),
                                array('prompt' => 'Выберите семестр'));
        ?>
		<?php echo $form->error($model,'semestr_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'module_id'); ?>
        <?php
            echo $form->dropDownList($model,
                                'module_id',
                                CHtml::listData(Module::model()->findAll(), 'id', 'RelatedData'),
                                array('prompt' => 'Выберите модуль'));
        ?>
		<?php echo $form->error($model,'module_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->