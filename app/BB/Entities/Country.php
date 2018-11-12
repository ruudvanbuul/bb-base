<?php

namespace App\BB\Entities;

use App\BB\Entity;
use Doctrine\Common\Collections\Collection;

class Country extends Entity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $name;

    /**
     * @return Collection|City[]
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
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return Collection|City[]
     */
    public function getCities() : Collection
    {
        return $this->cities;
    }
}