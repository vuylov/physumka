<?php
/* @var $this StatisticController */
/* @var $model Statistic */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'statistic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
        <?php echo $form->dropDownList(
                    $model,
                    'user_id',
                    CHtml::listData(User::model()->findAll(
                        array("condition" => "role_id = 4")//4 - role student
                    ), 'id', 'numbook'),
                    array(
                        'prompt' => 'Выберите студента',
                        'class'  => 'span7'
                    )
    ); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_period_id'); ?>
        <?php echo $form->dropDownList(
                $model,
                'cur_period_id',
                CHtml::listData(CurPeriod::model()->findAll(), 'id', 'RelatedData'),
                array(
                    'prompt' => 'Выберите учебный модуль',
                    'class'  => 'span7'
                )
        ); ?>
		<?php echo $form->error($model,'cur_period_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'exercise_id'); ?>
        <?php echo $form->dropDownList(
                $model,
                'exercise_id',
                CHtml::listData(Exercise::model()->findAll(), 'id', 'name'),
                array(
                    'prompt' => 'Выберите тип упражнения',
                    'class'  => 'span7'
                )
    ); ?>
		<?php echo $form->error($model,'exercise_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'raw_result'); ?>
		<?php echo $form->textField($model,'raw_result',array('size'=>60,'maxlength'=>255, 'class'=>'span7')); ?>
		<?php echo $form->error($model,'raw_result'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ball_result'); ?>
		<?php echo $form->textField($model,'ball_result', array('class'=>'span7')); ?>
		<?php echo $form->error($model,'ball_result'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->