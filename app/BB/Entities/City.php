<?php

namespace App\BB\Entities;

use App\BB\Entity;
use Doctrine\Common\Collections\Collection;

class City extends Entity
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
     * @var Country
     */
    protected $country;

    /**
     * @var Collection|Location[]
     */
    protected $locations;

    /**
     * @param array $properties The properties for the object
     * @param Country $country
     */
    public function __construct(array $properties, Country &$country)
    {
        parent::__construct($properties);

        $this->country = country;
    }

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
     * @return Country
     */
    public function getCountry() : Country
    {
        return $this->country;
    }

    /**
     * @return Collection|Location[]
     */
    public function getLocations() : Collection
    {
        return $this->locations;
    }
}