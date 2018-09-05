<?php

namespace App\BB\Entities;

class Room
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Property
     */
    protected $property;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setProperty(Property $property)
    {
        return $this->property = $property;
    }

    public function getProperty()
    {
        return $this->property;
    }
}