<?php

namespace App\Traits;

trait ReflectionTrait
{
    /**
     * Invoke private method.
     *
     * @param string $object
     * @param string $method
     * @param array $args
     * @return void
     */
    public function invokeMethod(&$object, $method, array $args = [])
    {
        $reflector = new \ReflectionClass(get_class($object));
        $method = $reflector->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $args);
    }

    /**
     * Invoke private properties.
     *
     * @param string $object
     * @param string $field
     * @return void
     */
    public function getPrivateProperties(&$object, $field)
    {
        $reflector = new \ReflectionClass(get_class($object));
        $property = $reflector->getProperty($field);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
