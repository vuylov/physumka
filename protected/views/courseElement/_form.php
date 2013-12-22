<?php
/* @var $this CourseElementController */
/* @var $model CourseElement */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-element-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'course_id'); ?>
        <?php
            echo $form->dropDownList($model, 'course_id',
                        CHtml::listData(Course::model()->findAll('author_id = :a', array(':a'=>Yii::app()->user->id)), 'id', 'name'),
                        array('prompt'=>'Выберите ваш курс')
            );
        ?>
		<?php echo $form->error($model,'course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_element_id'); ?>
        <?php

            echo $form->dropDownList($model, 'type_element_id',
                        CHtml::listData(TypeCourseElement::model()->findAll(), 'id', 'name'),
                        array('prompt'=>'Выберите тип учебного элемента')
            );
        ?>
		<?php echo $form->error($model,'type_element_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order'); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->