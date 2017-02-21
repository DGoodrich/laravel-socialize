<?php

namespace App\Models\Contracts;


interface BaseInterface {

    /**
     * Interface to get all resources
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Interface to get all resources with condition
     *
     * @param array $attributes
     * @return mixed
     */
    public function getAllWhere(array $attributes);

    /**
     * Interface to get resources with conditions
     *
     * @param array $attributes
     * @return mixed
     */
    public function findWhere(array $attributes);

    /**
     * Interface to get a count on all resources
     *
     * @return mixed
     */
    public function getTotal();

    /**
     * Interface to find specific resource by id
     *
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * Interface to create new resource
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Interface to update a resource
     *
     * @param $id
     * @param array $attributes
     * @return mixed
     * @internal param $input
     */
    public function update($id, array $attributes);

    /**
     * Interface to delete a resource
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id);

}