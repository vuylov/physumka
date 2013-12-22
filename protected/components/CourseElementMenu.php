<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Владелец
 * Date: 23.10.12
 * Time: 15:40
 * To change this template use File | Settings | File Templates.
 */
class CourseElementMenu extends CComponent
{

    /*
     * Return array of course elements for menu widget
     * @param int $id course unique ID
     */
    public static function getItems($id)
    {
        $elements = CourseElement::model()->findAll(
            array(
                'condition' => 'course_id = :c',
                'order'     => '`order`',
                'params'    => array(':c'=>$id)
            ));

        $items = array();

        foreach($elements as $element)
        {
            $item = CourseElement::loadModelElement($element->type_element_id, $element->id);
            $items[] = array('label'=>$item->name, 'url'=>array(strtolower(get_class($item)).'/show', 'id'=>$item->id));
        }

        return $items;
    }

}
