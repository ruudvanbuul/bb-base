<?php

namespace App\BB\Entities;

class Country
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
    protected $regions;

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

    public function getRegions()
    {
        return $this->regions;
    }
}