<?php

namespace App\BB\Entities;

use Doctrine\Common\Collections\Collection;

class Region
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
     * @var Region
     */
    protected $parentRegion;

    /**
     * @var Collection|Region[]
     */
    protected $regions;

    /**
     * @var Collection|City[]
     */
    protected $cities;

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

    public function parentRegion()
    {
        return $this->parentRegion;
    }

    public function getRegions()
    {
        return $this->regions;
    }

    public function getCities()
    {
        return $this->cities;
    }
}