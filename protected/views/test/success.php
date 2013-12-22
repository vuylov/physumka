<div class="span3">
    <div class="well">
        <?php
        //import menu of course elements
        Yii::import('CourseElementMenu');

        $this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'list',
            'items'=>CourseElementMenu::getItems(Yii::app()->user->getState('course'))
        ));
        ?>
    </div>
</div>
<div class="span9">
    <div class="well">
        Тест проден.<br>
        Набрано баллов: <?php echo $user_score; ?>
    </div>
</div>