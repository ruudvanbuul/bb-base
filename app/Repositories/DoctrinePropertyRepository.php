<?php

namespace App\Repositories;

use App\BB\Entities\Property;
use App\BB\Repositories\PropertyRepository;
use Doctrine\ORM\EntityRepository;
use EntityManager;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;

class DoctrinePropertyRepository implements PropertyRepository
{
    use PaginatesFromRequest;

    private $genericRepository;

    public function __construct(EntityRepository $genericRepository)
    {
        $this->genericRepository = $genericRepository;
    }

    public function createQueryBuilder($alias, $indexBy = null)
    {
        return $this->genericRepository->createQueryBuilder($alias, $indexBy);
    }

    public function all(int $perPage) : LengthAwarePaginator
    {
        return $this->paginateAll($perPage);
    }

    public function find(int $id) : Property
    {
        return $this->genericRepository->find($id);
    }

    public function findByName(string $name) : array
    {
        return $this->genericRepository->createQueryBuilder('p')
            ->where('p.name LIKE :name')
            ->setParameter('name', '%' . $name . '%')
            ->getQuery()
            ->getResult();
    }

    public function add(Property $property) : bool
    {
        try {
            EntityManager::persist($property);
            EntityManager::flush();
        } catch (Exception $e) {
            return false;
        }
    }

    public function remove(int $id) : bool
    {
        try {
            EntityManager::remove(EntityManager::getReference(Property::class, $id));
            EntityManager::flush();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}