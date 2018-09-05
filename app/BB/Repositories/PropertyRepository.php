<?php

namespace App\BB\Repositories;

use App\BB\Entities\Property;
use Doctrine\Common\Collections\Collection;

interface PropertyRepository
{
    /*
     * @var Property[]
     */
    public function all() : array;

    /*
     * @var Property
     */
    public function find($id) : Property;

    /*
     * @var Property[]
     */
    public function findByName($name) : array;

    public function add(Property $property);
    public function remove(Property $property);
}