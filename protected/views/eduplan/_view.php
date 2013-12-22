<?php
/* @var $this EduplanController */
/* @var $data Eduplan */
?>

<div class="view">

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disease_id')); ?>:</b>
	<?php echo CHtml::encode($data->disease->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year_begin')); ?>:</b>
	<?php echo CHtml::encode($data->year_begin); ?>
	<br />


</div>