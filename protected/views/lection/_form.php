<?php
/* @var $this LectionController */
/* @var $model Lection */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lection-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля с красной звездочкой <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="attribute">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name', array('class'=>'span10')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="attribute">
		<?php echo $form->labelEx($model,'content'); ?>
        <?php

        $this->widget('ext.tinymce.TinyMce', array(
            'model'=>$model,
            'attribute' => 'content',
            'fileManager'=>array(
                'class'=>'ext.elFinder.TinyMceElFinder',
                'connectorRoute'=>'elfinder/connector',
            ),
            'htmlOptions' => array(
                'rows'=>10,
                'class'=> 'span10',
            ),
        ));

        ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="attribute buttons pull-right">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Обновить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>
