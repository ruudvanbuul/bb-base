<?php

namespace App\BB\Entities;

use Doctrine\Common\Collections\Collection;

class City
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
    protected $region;

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

    public function getRegion()
    {
        return $this->region;
    }
}