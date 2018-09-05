<?php

namespace App\BB\Entities;

class Location
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var Property
     */
    protected $property;

    /**
     * @param $address
     */
    public function __construct($address)
    {
        $this->address = $address;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function getCountry()
    {
        return $this->country;
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