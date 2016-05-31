<?php

namespace App\Repositories\Contracts;

/**
 * Interface RepositoryInterface.
 */
interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param int   $perPage
     * @param null  $appends
     * @param array $columns
     *
     * @return mixed
     */
    public function allPaginated($perPage = 15, $appends = null, $columns = ['*']);

    /**
     * @param $field
     * @param $value
     * @param array $columns
     *
     * @return mixed
     */
    public function search($field, $value, $columns = ['*']);

    /**
     * @param $field
     * @param $value
     * @param int   $perPage
     * @param null  $appends
     * @param array $columns
     *
     * @return mixed
     */
    public function searchPaginated($field, $value, $perPage = 15, $appends = null, $columns = ['*']);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $id
     *
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param array $data
     * @param $model
     *
     * @return mixed
     */
    public function updateFillable(array $data, $model);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function findOrFail($id, $columns = ['*']);

    /**
     * @param $field
     * @param $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findBy($field, $value, $columns = ['*']);
}
