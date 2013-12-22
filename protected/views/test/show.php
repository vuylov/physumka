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
        <?php $this->widget('bootstrap.widgets.TbDetailView', array(
        'data'=>$model,
        'attributes'=>array(
            array('name'=>'name', 'label'=>'Наименование теста'),
            array('name'=>'attempts', 'label'=>'Количество попыток'),
            array('name'=>'ball_to_pass', 'label'=>'Проходной балл'),
        ),
    )); ?>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('test/start', array('id'=>$model->id)); ?>">Начать тест</a>
        </div>
    </div>
</div>