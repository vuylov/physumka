<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'answer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'question_id',array('class'=>'span5')); ?>

	<?php //echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

    <?php

    $this->widget('ext.tinymce.TinyMce', array(
        'model'=>$model,
        'attribute' => 'content',
        'fileManager'=>array(
            'class'=>'ext.elFinder.TinyMceElFinder',
            'connectorRoute'=>'elfinder/connector',
        ),
        'htmlOptions' => array(
            'rows'=>20,
            'cols'=>5,
            'class'=> 'span6',
        ),
    ));

    ?>


	<?php //echo $form->textFieldRow($model,'is_correct',array('class'=>'span5','maxlength'=>1)); ?>
    <?php echo $form->checkBoxRow($model, 'is_correct'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
