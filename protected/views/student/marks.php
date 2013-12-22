<?php
/* @var $this StudentController */

$this->breadcrumbs=array(
	'Student'=>array('/student'),
	'Marks',
);
?>
<div class="span12">
     <table class="table table-striped">
		<caption><h3>Нормативы</h3></caption>
		<tr>
			<th>Упражнение</th><th>Результат</th><th>Оценка (баллы)</th>
		</tr>
	 <?php
        if($normatives)
        {
            foreach($normatives as $normative)
            {
                echo "<tr><td>".$normative->exercise->name."</td><td>".$normative->raw_result."</td><td>".$normative->ball_result."</td></tr>";
            }
        }
		else
		{
			echo '<tr><td colspan="3">Данных нет</td></tr>';
		}
    ?>
	</table>
	
	<table class="table table-striped">
		<caption><h3>Теория</h3></caption>
		<tr>
			<th>Курс</th><th>Результат</th><th>Оценка (баллы)</th>
		</tr>
		<tr>
			<td>Баскетбол</td><td>
				<div>Тест №1. Набрано 5 из 5</div>
				<div>Тест №2 не пройден. Дано 2 правильных ответа (из 5 возможных)</div>
				<div>Тест №3  Набрано 3 из 5</div>
				<div>Тест №4  Набрано 4 из 5</div>
				<div>Тест №5 не пройден. Дан 1 правильный ответ (из 5 возможных)</div>
				<div>Тест №6  Набрано 4 из 5</div>
				<div>Тест №7 не пройден. Дано 2 правильных ответа (из 5 возможных)</div>
				<div>Тест №8. Набрано 5 из 5</div>
				<div>Тест №9. Набрано 5 из 5</div>
			</td><td>3</td>
		</tr>
	</table>
</div>