<?php

namespace App\Repositories;

use App\BB\Entities\Property;
use App\BB\Repositories\PropertyRepository;
use Doctrine\Common\Collections\Collection;
use EntityManager;
use Doctrine\Common\Persistence\ObjectRepository;

class DoctrinePropertyRepository implements PropertyRepository
{
    private $genericRepository;

    public function __construct(ObjectRepository $genericRepository)
    {
        $this->genericRepository = $genericRepository;
    }

    public function all() : array
    {
        return $this->genericRepository->findAll();
    }

    public function find($id) : Property
    {
        return $this->genericRepository->find($id);
    }

    public function findByName($name) : array
    {
        return $this->genericRepository->findBy(['name' => $name]);
    }

    public function add(Property $property)
    {
        EntityManager::persist($property);
        EntityManager::flush();
    }

    public function remove(Property $property)
    {
        EntityManager::remove($property);
        EntityManager::flush();
    }
}