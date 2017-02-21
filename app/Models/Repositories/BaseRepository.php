<?php namespace App\Models\Repositories;

use Carbon\Carbon;

abstract class BaseRepository {

	/**
	 * The Model instance.
	 */
	protected $model;

    /**
     * Applies the given where conditions to the model.
     *
     * @param array $where
     * @return void
     */
    protected function applyConditions(array $where)
    {
        foreach ($where as $field => $value)
        {
            if (is_array($value))
            {
                list($field, $condition, $val) = $value;

                $this->model = $this->model->where($field, $condition, $val);

            }
            else
            {
                $this->model = $this->model->where($field, '=', $value);
            }
        }
    }

    /**
     * Find data by multiple fields.
     *
     * @param array $where
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhere(array $where, $columns = ['*'])
    {
        $this->applyConditions($where);

        return $this->model->get($columns);
    }

    /**
     * Find data by multiple values in one field.
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereIn($field, array $values, $columns = ['*'])
    {
        return $this->model->whereIn($field, $values)->get($columns);
    }
    /**
     * Find data by excluding multiple values in one field.
     *
     * @param       $field
     * @param array $values
     * @param array $columns
     *
     * @return mixed
     */
    public function findWhereNotIn($field, array $values, $columns = ['*'])
    {
        return $this->model->whereNotIn($field, $values)->get($columns);
    }

    /**
     * Get users collection paginate.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->paginate(6);
    }

    /**
     * Get users collection paginate.
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllWhere(array $attributes)
    {
        $this->applyConditions($attributes);

        return $this->model->paginate(6);
    }

    /**
     * Get Model by id.
     *
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
	 * Get number of records.
	 *
	 * @return array
	 */
	public function getTotal()
	{
		$total = $this->model->count();

        $new = $this->model->where('created_at', '>=', Carbon::now()->startOfMonth())->count();

		return compact('total', 'new');
	}

    /**
     * Create a record.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $user = $this->model->create($attributes);

        return $user;
    }

    /**
     * Update a record.
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        $user = $this->model->findOrFail($id);

        $user->update($attributes);

        return $user;
    }

	/**
	 * Destroy a model.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function destroy($id)
	{
		$this->getById($id)->delete();
	}



}
