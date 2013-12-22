<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('numbook')); ?>:</b>
	<?php echo CHtml::encode($data->numbook); ?>
	<br />

	<!--<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_registration')); ?>:</b>
	<?php echo CHtml::encode($data->date_registration); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('date_admission')); ?>:</b>
    <?php echo CHtml::encode($data->date_admission); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group["name"]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disease_id')); ?>:</b>
	<?php echo CHtml::encode($data->disease["name"]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_id')); ?>:</b>
	<?php echo CHtml::encode($data->role["name"]); ?>
	<br />


</div>