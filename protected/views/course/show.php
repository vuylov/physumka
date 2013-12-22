<div class="span3">
    <div class="well">
        <?php
        //import menu of course elements
        Yii::import('CourseElementMenu');

        $this->widget('bootstrap.widgets.TbMenu', array(
            'type'=>'list',
            'items'=>CourseElementMenu::getItems($id)
        ));
        ?>
    </div>
</div>
<div class="span9">
    <div class="well">
        Используйте левое меню для прохождения учебных элементов курса
    </div>
</div>
