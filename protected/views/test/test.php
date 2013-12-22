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
        <?php
            $form = $this->beginWidget('CActiveForm');
        ?>
        <?php foreach($questions as $question):?>
        <div class="row-fluid">
            <div class="span5">
                <?php echo $question->content; ?>
            </div>
            <div class="span4">
                <blockquote>
                    <?php foreach($question->answers as $answer): ?>
                    <div style="overflow: hidden;">
                    <label class="radio">
                        <input type="radio" name="question[question_<?php echo $question->id ?>]" value="<?php echo $answer->id; ?>"><p><?php echo $answer->content; ?></p>
                    </label>
                    </div>
                    <?php endforeach;?>
                </blockquote>
            </div>
        </div>
        <hr>
        <?php endforeach; ?>
        <?php echo CHtml::hiddenField('test_id', $test_id);?>
        <div class="pull-right">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Закончить тест')); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>