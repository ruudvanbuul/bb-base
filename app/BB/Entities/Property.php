<?php

namespace App\BB\Entities;

use App\BB\Entity;
use App\BB\ValueObjects\Range;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class Property extends Entity
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
     * @var Location
     */
    protected $location;

    /**
     * @var Collection|Room[]
     */
    protected $rooms;

    /**
     * @param array $properties The properties for the object
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);

        if (!$this->rooms instanceof Collection) {
            $this->rooms = new ArrayCollection;
        }
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
     * @param Location $location
     * @return self
     */
    public function setLocation(Location $location) : self
    {
        $location->setProperty($this);
        $this->location = $location;

        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation() : Location
    {
        return $this->location;
    }

    /**
     * @return Range
     */
    public function getPriceRange() : Range
    {
        return new Range($this->rooms->first()->getPrice(), $this->rooms->last()->getPrice());
    }

    /**
     * @param Room $room
     * @return bool
     */
    public function addRoom(Room $room) : bool
    {
        if (!$this->rooms->contains($room)) {
            $room->setProperty($this);
            $this->rooms->add($room);

            return true;
        }

        return false;
    }

    /**
     * @return Collection|Room[]
     */
    public function getRooms() : Collection
    {
        return $this->rooms;
    }
}