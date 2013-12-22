<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">

    <div id="span12">
        <?$this->widget('bootstrap.widgets.TbMenu', array(
        'type'  => 'pills',
        'stacked'=>false,
        'items' => array(
            array('label' => 'Главная', 'url' => array('methodist/index')),
            array('label' => 'Образовательные программы', 'url' => array('eduprog/index')),
            array('label' => 'Группы', 'url' => array('group/index')),
            array('label' => 'Пользователи', 'url' => array('user/index')),
            array('label' => 'Курсы', 'url' => array('course/index')),
            array('label' => 'Заболевания', 'url' => array('disease/index')),
            array('label' => 'Учебные планы', 'url' => array('eduplan/index')),
            array('label' => 'Структура УП', 'url' => array('curPeriod/index')),
            array('label' => 'Курсы УП', 'url' => array('coursePeriod/index')),
			array('label' => 'ИФКС', 'url' => array('methodist/ifks')),

            array('label' => 'Выйти', 'url' => array('site/logout')),
        ),
    ));
        ?>
        <hr class="under-menu">
    </div>
</div>
<div class="row">
    <div class="span9">
        <?php echo $content; ?>
    </div>
    <div class="span3">
        <?php
        $this->beginWidget('zii.widgets.CPortlet', array(
            'title'=>'Доступные операции',
        ));
        $this->widget('zii.widgets.CMenu', array(
            'items'=>$this->menu,
            'htmlOptions'=>array('class'=>'operations'),
        ));
        $this->endWidget();
        ?>
    </div>
</div>

<?php $this->endContent(); ?>