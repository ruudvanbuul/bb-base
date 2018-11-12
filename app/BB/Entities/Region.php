<?php

namespace App\BB\Entities;

use App\BB\Entity;
use Doctrine\Common\Collections\Collection;

class Region extends Entity
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
     * @return Region
     */
    public function parentRegion() : Region
    {
        return $this->parentRegion;
    }

    /**
     * @return Collection|Region[]
     */
    public function getRegions() : Collection
    {
        return $this->regions;
    }

    /**
     * @return Collection|City[]
     */
    public function getCities() : Collection
    {
        return $this->cities;
    }
}