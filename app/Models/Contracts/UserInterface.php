<?php

namespace App\Models\Contracts;


use Illuminate\Http\UploadedFile;

interface UserInterface extends BaseInterface {

    /**
     * Interface for searchable resources
     *
     * @param $data
     * @return mixed
     */
    public function search($data);

    /**
     * Interface form uploading user profile photo
     *
     * @param $id
     * @param $file
     * @param array $dimensions
     * @return mixed
     */
    public function uploadProfilePhoto($id, UploadedFile $file, array $dimensions);

    /**
     * Interface to find resource by username
     *
     * @param $username
     * @return mixed
     */
    public function getByUsername($username);

    /**
     * Interface for banning / un-banning users
     *
     * @param array $users
     * @param $isBanned
     * @return void
     */
    public function setBanUsers(array $users, $isBanned);

}