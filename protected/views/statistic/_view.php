<?php
/* @var $this StatisticController */
/* @var $data Statistic */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->numbook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_period_id')); ?>:</b>
	<?php echo CHtml::encode($data->curPeriod->getRelatedData()); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exercise_id')); ?>:</b>
	<?php echo CHtml::encode($data->exercise->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raw_result')); ?>:</b>
	<?php echo CHtml::encode($data->raw_result); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ball_result')); ?>:</b>
	<?php echo CHtml::encode($data->ball_result); ?>
	<br />


</div>