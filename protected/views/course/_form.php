<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отчеменные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255, 'class' => 'span6')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
        <?php
              echo $form->dropDownList($model, 'author_id',
                                CHtml::listData(User::model()->findAll('role_id=:role_id', array(':role_id'=>3)), 'id', 'numbook'),
                                array('prompt' => 'Выберите преподавателя', 'class'=>'span6'));
        ?>
		<?php echo $form->error($model,'author_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    //'name'=>'date_created',
                    'model'=> $model,
                    'attribute' => 'date_created',
                    'language' => 'ru',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy-mm-dd',
                        'changeYear'=> true,
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;',
                        'class'=>'span6'
                    ),
                ));?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->