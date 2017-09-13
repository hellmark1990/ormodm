<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 13.09.17
 * Time: 22:34
 */

namespace Mshem\OrmOdmRelationBundle\Annotation\ORM;


use Doctrine\Common\Annotations\Reader;

class OneToManyConverter {
    private $reader;
    private $annotationClass = 'Mshem\\OrmOdmRelationBundle\\Annotation\\OneToMany';

    public function __construct(Reader $reader){
        $this->reader = $reader;
    }

    public function convert($originalObject){
        $convertedObject = new \stdClass;

        $reflectionObject = new \ReflectionObject($originalObject);

        foreach ($reflectionObject->getMethods() as $reflectionMethod) {
            // fetch the @StandardObject annotation from the annotation reader
            dump($reflectionMethod);exit;
            $annotation = $this->reader->getMethodAnnotation($reflectionMethod, $this->annotationClass);
            if (null !== $annotation) {

                $propertyName = $annotation->getPropertyName();

                // retrieve the value for the property, by making a call to the method
                $value = $reflectionMethod->invoke($originalObject);

                // try to convert the value to the requested type
                $type = $annotation->getDataType();
                if (false === settype($value, $type)) {
                    throw new \RuntimeException(sprintf('Could not convert value to type "%s"', $value));
                }

                $convertedObject->$propertyName = $value;
            }
        }

        return $convertedObject;
    }
}