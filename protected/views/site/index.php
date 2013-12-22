<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="container">
    <div class="row-fluid">

        <div class="span8">
            <div id="myCarousel" class="carousel slide">
			  <!-- Carousel items -->
			  <div class="carousel-inner">
				<div class="active item"><img src="/images/img1.jpg"></div>
				<div class="item"><img src="/images/img2.jpg"></div>
				<div class="item"><img src="/images/img3.jpg"></div>
				<div class="item"><img src="/images/img4.jpg"></div>
			  </div>
			  <!-- Carousel nav -->
			  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
        </div>
        <div class="span4">
            <h1>Авторизация</h1>

            <div class="form">
                <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                ),
            )); ?>

                <p class="note">Поля с <span class="required">*</span> обязательны для заполнения.</p>

                <div>
                    <?php echo $form->labelEx($model,'username'); ?>
                    <?php echo $form->textField($model,'username', array('class'=>'span12')); ?>
                    <?php echo $form->error($model,'username'); ?>
                </div>

                <div>
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password', array('class'=>'span12')); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div>

                <div class="pull-right">
                    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Войти')); ?>
                </div>

                <?php $this->endWidget(); ?>
            </div><!-- form -->

        </div>

    </div>
</div>

