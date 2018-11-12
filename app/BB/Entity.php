<?php

namespace App\BB;

class Entity extends DataObject
{
    /**
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        foreach (get_object_vars($this) as $var => $val) {
            if (array_key_exists($var, $properties)) {
                $this->$var = $properties[$var];
            }
        }
    }

    /**
     * @param array $properties
     * @return Entity
     */
    public function __overrideProperties(array $properties)
    {
        foreach (get_object_vars($this) as $var => $val) {
            if (array_key_exists($var, $properties)) {
                $this->$var = $properties[$var];
            }
        }

        return $this;
    }

    /**
     * @param string $property
     * @param $reference
     * @return Entity
     */
    public function __setPropertyByReference(string $property, &$reference)
    {
        if (property_exists($this, $property)) {
            $this->$property = $reference;
        }

        return $this;
    }
}