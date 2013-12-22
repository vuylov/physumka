<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row">

    <div id="span12">
        <?$this->widget('bootstrap.widgets.TbMenu', array(
        'type'  => 'pills',
        'stacked'=>false,
        'items' => array(
            array('label' => 'Текущие дисциплины', 'url' => array('student/index')),
           // array('label' => 'Мой учебный план', 'url' => array('student/eduplan')),
            array('label' => 'Мои оценки', 'url' => array('student/marks')),
            array('label' => 'Выйти', 'url' => array('site/logout')),
        ),
    ));
        ?>
    </div>
</div>
<div class="row">
    <div class="span12">
        <?php echo $content; ?>
    </div>
</div>

<?php $this->endContent(); ?>