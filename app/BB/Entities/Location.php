<?php

namespace App\BB\Entities;

use App\BB\Entity;

class Location extends Entity
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
     * @var City
     */
    protected $city;

    /**
     * @var Property
     */
    protected $property;

    /**
     * @param array $properties The properties for the object
     * @param Property $property
     * @param City city
     */
    public function __construct(array $properties, Property &$property, City &$city)
    {
        parent::__construct($properties);

        $this->property = $property;
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return array
     */
    public function getCity(): array
    {
        return [
            'id' => $this->city->getId(),
            'name' => $this->city->getName(),
        ];
    }

    /**
     * @return array
     */
    public function getCountry(): array
    {
        return [
            'id' => $this->city->getCountry()->getId(),
            'name' => $this->city->getCountry()->getName(),
        ];
    }

    /**
     * @param Property $property
     * @return self
     */
    public function setProperty(Property $property): self
    {
        $this->property = $property;

        return $this;
    }

    /**
     * @return Property
     */
    public function getProperty(): Property
    {
        return $this->property;
    }
}