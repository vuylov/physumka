<?php
/* @var $this CurPeriodController */
/* @var $data CurPeriod */
?>

<div class="view">

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> -->

	<b><?php echo CHtml::encode($data->getAttributeLabel('eduplan_id')); ?>:</b>
	<?php echo CHtml::encode($data->eduplan->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semestr_id')); ?>:</b>
	<?php echo CHtml::encode($data->semestr->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('module_id')); ?>:</b>
	<?php echo CHtml::encode($data->module->name); ?>
	<br />


</div>