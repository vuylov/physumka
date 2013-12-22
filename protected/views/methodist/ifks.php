<div class="span12">
	<?php 
	 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	)); ?>
		<h3>ИФКС студента</h3>
                <div class="row">
                    <?php
                        echo $form->dropDownList($curPeriod, 'id',
                        CHtml::listData(CurPeriod::model()->findAll(), 'id', 'RelatedData'),
                                array(
                                    'prompt' => 'Выберите учебный период',
                                    'class' => 'span7'
                                ));
                    ?>
                </div>
		<div class="row">	
		<?php
                echo $form->dropDownList($user, 'id',
                            CHtml::listData(User::model()->findAll('role_id = 4'), 'id', 'numbook'),
                            array(
                                'prompt' => 'Выберите студента',
                                'class'=> 'span7'
                            ));		
               ?>
	</div>
	<div>
		<?php echo CHtml::submitButton('Просмотреть'); ?>
	</div>
	<p>
		<?php
			if($html)
			{
				echo $html;
			}
		?>
	</p>
	<?php $this->endWidget(); ?>
</div>