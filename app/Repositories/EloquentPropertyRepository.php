<?php

namespace App\Repositories;

use App\BB\Entities\Location;
use App\BB\Entities\Room;
use App\City;
use \App\Property as PropertyEloquentModel;
use App\BB\Entities\Property;
use App\BB\Repositories\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Database\Eloquent\Collection;

class EloquentPropertyRepository implements PropertyRepository
{
    public function all(): array
    {
        $this->convertToEntities(PropertyEloquentModel::with(['location', 'rooms'])->get());
    }

    public function find($id): Property
    {
        return $this->convertToEntity(
            PropertyEloquentModel::with(['location', 'rooms'])
                ->find($id)
        );
    }

    public function findByName($name): array
    {
        return $this->convertToEntities(
            PropertyEloquentModel::with(['location.city.country', 'rooms'])
                ->where('name', 'like', '%' . $name . '%')
                ->get()
        );
    }

    public function add(Property $property): bool
    {
        $p = new PropertyEloquentModel;

        $p->name = $property->getName();
        return $p->save();
    }

    public function remove($id): bool
    {
        $p = PropertyEloquentModel::find($id);

        $p->location()->delete();
        $p->rooms()->delete();

        return $p->delete();
    }

    private function convertToEntity(PropertyEloquentModel $property) : Property
    {
        $propertyProperties = $property->toArray();
        $p = new Property($propertyProperties);

        if (is_array($propertyProperties['location'])) {
            $propertyProperties['location'] = new Location($propertyProperties['location'], $p);
            $propertyProperties['location']->__setPropertyByReference('property', $p);
        }

        $rooms = new ArrayCollection();

        foreach ($property->rooms as $room) {
            $room = new Room($room->toArray());
            $room->__setPropertyByReference('property', $p);
            $rooms->add($room);
        }

        $propertyProperties['rooms'] = $rooms;

        $p->__overrideProperties($propertyProperties);

        return $p;
    }

    /*
     * @param Collection|Property[] $properties
     */
    private function convertToEntities(Collection $properties)
    {
        $r = [];

        foreach ($properties as $property) {
            $r[] = $this->convertToEntity($property);
        }

        return $r;
    }
}