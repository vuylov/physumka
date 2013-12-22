<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Поля отмеченные звездочкой <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <?php echo $form->dropDownListRow($model, 'test_id',
                            CHtml::listData(Test::model()->findAll(), 'id', 'name'),
                            array('prompt' => 'Выберите тест', 'class'=>'span8'));
        ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span8','maxlength'=>255)); ?>

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
                'rows'=>8,
                'class'=> 'span8',
            ),
        ));

        ?>
        
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
