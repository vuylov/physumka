<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Владелец
 * Date: 22.10.12
 * Time: 14:01
 * To change this template use File | Settings | File Templates.
 */
class ElfinderController extends CController
{
    public function actions()
    {
        return array(
            'connector' => array(
                'class' => 'ext.elFinder.ElFinderConnectorAction',
                'settings' => array(
                    'root' => Yii::getPathOfAlias('webroot').'/uploads/',
                    'URL' => Yii::app()->baseUrl .'/uploads/',
                    'lang' => 'ru',
                    'rootAlias' => 'Home',
                    'mimeDetect' => 'none'
                )
            ),
        );
    }
}
