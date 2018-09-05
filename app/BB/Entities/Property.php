<?php

namespace App\BB\Entities;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class Property
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
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;

        $this->rooms = new ArrayCollection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setLocation(Location $location)
    {
        $location->setProperty($this);
        $this->location = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function addRoom(Room $room)
    {
        if(!$this->rooms->contains($room)) {
            $room->setProperty($this);
            $this->rooms->add($room);
        }
    }

    public function getRooms()
    {
        return $this->rooms->toArray();
    }
}