<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 13.09.17
 * Time: 21:48
 */

namespace Mshem\OrmOdmRelationBundle\Annotation\ORM;


/**
 * Class OneToMany
 * @package Mshem\OrmOdmRelationBundle\Annotation\ORM
 *
 * @Annotation
 */
class OneToMany {

    private $propertyName;
    private $dataType = 'string';

    public function __construct($options){
        dump(22);exit;

        if (isset($options['value'])) {
            $options['propertyName'] = $options['value'];
            unset($options['value']);
        }

        foreach ($options as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException(sprintf('Property "%s" does not exist', $key));
            }

            $this->$key = $value;
        }
    }

    public function getPropertyName(){
        return $this->propertyName;
    }

    public function getDataType(){
        return $this->dataType;
    }
}