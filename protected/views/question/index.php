<?php
$this->breadcrumbs=array(
	'Questions',
);

$this->menu=array(
	array('label'=>'Добавить вопрос','url'=>array('create', 'test_id'=>$test_id)),
	array('label'=>'Вернуться к тесту','url'=>array('test/view', 'id'=>$test_element_id)),
);
?>

<h2>Список вопросов</h2>

<?php
    if(!$dataProvider->getData())
    {
        echo '<table class="table table-striped"><tr><th>Название вопроса</th><th>Управление</th></tr>';
        echo '<tr><td colspan="2">В данном тесте не создано ни одного вопроса</td></tr></table>';
    }
    else
    {
        echo '<table class="table table-striped"><tr><th>Название вопроса</th><th>Управление</th></tr>';
        foreach($dataProvider->getData() as $question)
        {
            //echo $question->name.'<br>';
            echo '<tr><td>'.$question->name.'</td>';
            echo '<td><a class="btn btn-primary btn-small" href="'.$this->createUrl('view', array('id'=>$question->id)).'">Просмотр</a>&nbsp;';
            echo '<a class="btn btn-primary btn-small" href="'.$this->createUrl('update', array('id'=>$question->id)).'">Редактировать</a>&nbsp;';
            echo '<a class="btn btn-primary btn-small" href="'.$this->createUrl('delete', array('id'=>$question->id)).'">Удалить</a>&nbsp;';
        }
        echo '</td></tr></table>';
    }
?>
