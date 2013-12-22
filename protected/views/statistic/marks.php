<div class="span12">
	<?php 
	 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	)); ?>
		<h4>Для просмотра результатов выберите группу</h4>
                <div class="row">
                    <?php
                        echo $form->dropDownList($groups[0],
										'id',
										CHtml::listData($groups, 'id', 'name'),
										array('empty'=>'Выберите группу'));
                    ?>
                </div>
	<div>
		<?php echo CHtml::submitButton('Просмотреть результаты'); ?>
	</div>
	<?php $this->endWidget(); ?>
	<?php if(isset($flag)): ?>
		<table class="table table-striped">
		<caption><h3>Результаты</h3></caption>
		<tr>
			<th>Номер зачетной книжки</th><th>Оценка (баллы)</th>
		</tr>
		<tr><td>ОРМ-1201</td><td>4</td></tr>
		<tr><td>ОРМ-1202</td><td>6</td></tr>
		<tr><td>ОРМ-1203</td><td>3</td></tr>
		<tr><td>ОРМ-1204</td><td>6</td></tr>
		
	</table>
	<?php endif; ?>
</div>