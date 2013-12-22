<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alena
 * Date: 07.10.12
 * Time: 13:28
 * To change this template use File | Settings | File Templates.
 */

echo '<h1>'.$id.'</h1>';
echo '<h2>'.$disease_id.'</h2>';
$this->widget('zii.widgets.CMenu', array(
    'items'=>array(
        array('label' => 'Home',    'url' => array('/site/index')),
        array('label' => 'Courses', 'url' => array('/student/courses'))
    ),
));