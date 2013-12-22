<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">

    <div class="span12">
        <?$this->widget('bootstrap.widgets.TbMenu', array(
        'type'  => 'pills',
        'stacked'=>false,
        'items' => array(
            array('label' => 'Мои дисциплины', 'url' => array('teacher/index'), 'css'=>'active'),
            array('label' => 'Нормативы', 'url' => array('statistic/index')),
			array('label' => 'Оценки', 'url' => array('statistic/marks')),
            array('label' => 'Выйти', 'url' => array('site/logout')),
        ),
    ));
        ?>
    </div>
    
</div>
<div class="row">
    <div class="span9">
        <?php echo $content; ?>
    </div>
    <div class="span3">
        <div id="sidebar">
        <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'Операции',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->

    </div>
</div>
<?php $this->endContent(); ?>