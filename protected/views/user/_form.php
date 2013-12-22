<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span>, обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numbook'); ?>
		<?php echo $form->textField($model,'numbook',array('class'=>'span6','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'numbook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'span6','size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_registration'); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    //'name'=>'User[date_registration]',
                    'attribute'=>'date_registration',
                    'model'=> $model,
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
		<?php echo $form->error($model,'date_registration'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'date_admission'); ?>
         <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    //'name'=>'User[date_admission]',
                    'attribute'=>'date_admission',
                    'model'=> $model,
                    'language' => 'ru',
                    // additional javascript options for the date picker plugin
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'yy',
                        'changeYear'=> true,
                    ),
                    'htmlOptions'=>array(
                        'style'=>'height:20px;',
                        'class'=>'span6'
                    ),
                ));?>
        <?php echo $form->error($model,'date_admission'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
        <?php
                echo $form->dropDownList($model, 'group_id',
                            CHtml::listData(Group::model()->findAll(), 'id', 'name'),
                            array(
                                'prompt' => 'Выберите группу',
                                'class'=> 'span6'
                            )

                );
        ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disease_id'); ?>
		<?php
              echo $form->dropDownList($model, 'disease_id',
                            CHtml::listData(Disease::model()->findAll(), 'id', 'name'),
                            array('prompt' => 'Выберите тип заболевания', 'class'=> 'span6')
              );

        ?>
		<?php echo $form->error($model,'disease_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php
              echo $form->dropDownList($model, 'role_id',
                            CHtml::listData(Role::model()->findAll(), 'id', 'name'),
                            array('prompt' => 'Укажите роль пользователя', 'class'=> 'span6')
              );
        ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->