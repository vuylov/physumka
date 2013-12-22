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
    <div class="well alert-error">
        Тест не пройден<br>
        Набрано <?php echo $user_score; ?> из <?php echo $total_pass_score; ?> необходимых баллов<br>
        <a href="<?php echo $this->createUrl('test/start', array('id'=>$id)); ?>">Повторить попытку?</a>
    </div>
</div>