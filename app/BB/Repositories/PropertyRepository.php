<?php

namespace App\BB\Repositories;

use App\BB\Entities\Property;
use App\BB\Entities\Test;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PropertyRepository
{
    /*
     * @var Property[]
     */
    public function all(int $perPage) : LengthAwarePaginator;

    /*
     * @var Property
     */
    public function find(int $id) : Property;

    /*
     * @var Property[]
     */
    public function findByName(string $name) : array;

    public function add(Property $property) : bool;

    public function remove(int $id) : bool;
}