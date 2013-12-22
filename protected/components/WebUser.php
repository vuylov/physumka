<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Владелец
 * Date: 25.09.12
 * Time: 11:42
 * To change this template use File | Settings | File Templates.
 */
class WebUser extends CWebUser
{
    public function checkAccess($operation, $param=array())
    {
        //if not identified => no rights
        if(empty($this->id))
        {
            return false;
        }
        //get role from Yii->app()
        $role = $this->getState('role');

        if($role === 'Администратор' || $role === 'Методист')
        {
            return true;
        }

        return ($operation=== $role);

    }
}
