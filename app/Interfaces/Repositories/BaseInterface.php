<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param array $relationships
     * @return Builder
     */
    public function getWith(array $relationships);

    /**
     * @param array $filters
     * @return Builder
     */
    public function search(array $filters);

    /**
     * @param int $identifier
     * @return Builder
     */
    public function find(int $identifier);

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes);

    /**
     * @param Model $object
     * @param array $attributes
     * @return mixed
     */
    public function update(Model $object, array $attributes);

    /**
     * @param Model $object
     * @return mixed
     */
    public function delete(Model $object);

    /**
     * @param Model $object
     * @return mixed
     */
    public function restore(Model $object);

    /**
     * @param Model $object
     * @return mixed
     */
    public function forceDelete(Model $object);

    /**
     * @param int $identifier
     * @return Model
     */
    public function findOrFail(int $identifier);

    /**
     * @param array $retriever
     * @param array $attributes
     * @return Model
     */
    public function firstOrCreate(array $retriever, ?array $attributes = NULL);

    /**
     * @param array $retriever
     * @param array $attributes
     * @return Model
     */
    public function firstOrNew(array $retriever, array $attributes);

    /**
     * @param array $retriever
     * @param array $attributes
     * @return Model
     */
    public function updateOrCreate(array $retriever, array $attributes);

    /**
     * @return Model
     */
    public function first();

}
