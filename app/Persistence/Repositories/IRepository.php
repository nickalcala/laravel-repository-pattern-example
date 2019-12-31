<?php

namespace App\Persistence\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface IRepository
{
    /**
     * @param int $id
     * @return Model|null
     */
    public function findOne(int $id): Model;

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @return Model|null
     */
    public function findOneBy(array $criteria, array $orderBy = null): Model;

    /**
     * @return Model[]|Collection
     */
    public function findAll();

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return Model[]|Collection
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);
}