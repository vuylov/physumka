<?php
$this->breadcrumbs=array(
	'Answers',
);

$this->menu=array(
	array('label'=>'Добавить ответ','url'=>array('create', 'question_id'=>$question_id)),
	array('label'=>'Вернуться к вопросу','url'=>array('question/view', 'id'=>$question_id)),
);
?>

<h2>Доступные ответы</h2>

<?php

    if(!$dataProvider->getData())
    {
        echo '<div>Нет ответов на этот вопрос</div>';
    }
    else
    {
        echo '<table class="table table-striped"><tr><th>Правильность ответа/Содержимое</th><th>Управление</th></tr>';
        foreach($dataProvider->getData() as $answer)
        {
            ($answer->is_correct)?$msg = 'Да':$msg='Нет';
            echo '<tr><td>Правильный ответ:'.$msg.' <hr>'.$answer->content.'</td>';
            echo '<td><a class="btn btn-primary btn-small" href="'.$this->createUrl('view', array('id'=>$answer->id)).'">Просмотр</a>&nbsp;';
            echo '<a class="btn btn-primary btn-small" href="'.$this->createUrl('update', array('id'=>$answer->id)).'">Редактировать</a>&nbsp;';
            echo '<a class="btn btn-primary btn-small" href="'.$this->createUrl('delete', array('id'=>$answer->id)).'">Удалить</a>&nbsp;';
        }
        echo '</td></tr></table>';
    }



?>
