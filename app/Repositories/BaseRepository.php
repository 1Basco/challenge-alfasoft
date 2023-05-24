<?php

namespace App\Repositories;

use App\Interfaces\Repositories\BaseInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $limit = request()->limit;

            if ($limit){

                return $this->model->paginate($limit);
            }else {

                return $this->model->all();
            }
    }

    /**
     * @param array $relationships
     * @return Builder
     */
    public function getWith(array $relationships)
    {
        return $this->model->with($relationships);
    }

    /**
     * @param array $filters
     * @return Builder
     */
    public function search(array $filters)
    {
        return $this->model->where($filters);
    }

    /**
     * @param int $identifier
     * @return Builder
     */
    public function find(int $identifier)
    {
        return $this->model->find($identifier);
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes)
    {

        return $this->model->create($attributes);
    }

    /**
     * @param Model $object
     * @param array $attributes
     * @return mixed
     */
    public function update(Model $object, array $attributes)
    {

        $object->update($attributes);

        return $object ?: null;
    }

    /**
     * @param Model $object
     * @return mixed
     */
    public function delete(Model $object)
    {

        return $object->delete();
    }

    /**
     * @param Model $object
     * @return mixed
     */
    public function restore(Model $object)
    {

        $object->restore();

        return $object ?: null;
    }

    /**
     * @param Model $object
     * @return mixed
     */
    public function forceDelete(Model $object)
    {

        return $object->forceDelete();
    }

    /**
     * @param int $identifier
     * @return Model
     */
    public function findOrFail(int $identifier)
    {
        return $this->model->findOrFail($identifier);
    }

    /**
     * @param array $retriever
     * @param array $attributes
     * @return Model
     */
    public function firstOrCreate(array $retriever, ?array $attributes = NULL)
    {

        if ($attributes)
            return $this->model->firstOrCreate($retriever, $attributes);
        else
            return $this->model->firstOrCreate($retriever);
    }

    /**
     * @param array $retriever
     * @param array $attributes
     * @return Model
     */
    public function firstOrNew(array $retriever, array $attributes)
    {
        return $this->model->firstOrNew($retriever, $attributes);
    }

    /**
     * @param array $retriever
     * @param array $attributes
     * @return Model
     */
    public function updateOrCreate(array $retriever, array $attributes)
    {

        return $this->model->updateOrCreate($retriever, $attributes);
    }

    /**
     * @return Model
     */
    public function first()
    {
        return $this->model->first();
    }

}
