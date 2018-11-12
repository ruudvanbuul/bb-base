<?php

namespace App\BB\Entities;

use App\BB\Entity;

class Room extends Entity
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
     * @var int
     */
    protected $price;

    /**
     * @var Property
     */
    protected $property;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice() : int
    {
        return $this->price;
    }

    /**
     * @param Property $property
     * @return self
     */
    public function setProperty(Property $property) : self
    {
        $this->property = $property;

        return $this;
    }

    /**
     * @return Property
     */
    public function getProperty() : Property
    {
        return $this->property;
    }
}