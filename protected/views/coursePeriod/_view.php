<?php
/* @var $this CoursePeriodController */
/* @var $data CoursePeriod */
?>

<div class="view">

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_id')); ?>:</b>
	<?php echo CHtml::encode($data->course->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_period_id')); ?>:</b>
	<?php echo CHtml::encode($data->curPeriod->RelatedData); ?>
	<br />


</div>