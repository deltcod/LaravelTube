<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\RepositoryException;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Repository.
 */
abstract class Repository implements RepositoryInterface
{
    /**
     * @var App
     */
    private $app;
    /**
     * @var
     */
    protected $model;

    /**
     * Repository constructor.
     *
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return mixed
     */
    abstract public function model();

    /**
     * @param array $columns
     *
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * @param int   $perPage
     * @param null  $appends
     * @param array $columns
     *
     * @return mixed
     */
    public function allPaginated($perPage = 15, $appends = null, $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns)->appends($appends);
    }

    /**
     * @param $field
     * @param $value
     * @param array $columns
     *
     * @return mixed
     */
    public function search($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, 'LIKE', "%$value%")->get();
    }

    /**
     * @param $field
     * @param $value
     * @param int   $perPage
     * @param null  $appends
     * @param array $columns
     *
     * @return mixed
     */
    public function searchPaginated($field, $value, $perPage = 15, $appends = null, $columns = ['*'])
    {
        return $this->model->where($field, 'LIKE', "%$value%")->paginate($perPage)->appends($appends);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     *
     * @return mixed
     */
    public function update(array $data, $id, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param array $data
     * @param $model
     *
     * @return mixed
     */
    public function updateFillable(array $data, $model)
    {
        $model->fill($data)->save();

        return $model;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function findOrFail($id, $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     *
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = ['*'])
    {
        return $this->model->where($attribute, '=', $value)->get();
    }

    /**
     * @throws RepositoryException
     *
     * @return Model|mixed
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }
}
