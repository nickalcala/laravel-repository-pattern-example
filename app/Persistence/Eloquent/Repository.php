<?php

namespace App\Persistence\Eloquent;

use App\Persistence\Repositories\IRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class Repository implements IRepository
{
    protected abstract function getQueryBuilder(): Builder;

    /**
     * @param int $id
     * @return Model|null
     */
    public function findOne(int $id): Model
    {
        return $this->getQueryBuilder()->find($id);
    }

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @return Model|null
     */
    public function findOneBy(array $criteria, array $orderBy = null): Model
    {
        $query = $this->getQueryBuilder()
            ->whereRowValues(array_keys($criteria), '=', array_values($criteria));

        if (!empty($orderBy)) {
            foreach ($orderBy as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        return $query->first();
    }

    /**
     * @return Model[]|Collection
     */
    public function findAll()
    {
        return $this->getQueryBuilder()
            ->get();
    }

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     * @return Model[]|Collection
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $query = $this->getQueryBuilder()
            ->whereRowValues(array_keys($criteria), '=', array_values($criteria));

        if (!empty($orderBy)) {
            foreach ($orderBy as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        if (isset($limit)) {
            $query->limit($limit);
        }

        if (isset($offset)) {
            $query->offset($offset);
        }

        return $query->get();
    }
}
