<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('course_element_id')); ?>:</b>
	<?php echo CHtml::encode($data->course_element_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attempts')); ?>:</b>
	<?php echo CHtml::encode($data->attempts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ball_to_pass')); ?>:</b>
	<?php echo CHtml::encode($data->ball_to_pass); ?>
	<br />


</div>