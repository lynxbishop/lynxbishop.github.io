<?php

namespace App\Interfaces;

//use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;

interface TodoInterface
{

    /**
     * Get all users
     *
     * @method  GET api/users
     * @access  public
     */
    public function getAll(Request $request);

    /**
     * Get User By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/users/{id}
     * @access  public

    public function getById($id);
     */

    /**
     * Create | Update user
     *
     * @param   \App\Http\Requests\UserRequest    $request
     * @param   integer                           $id
     *
     * @method  POST    api/users       For Create
     * @method  PUT     api/users/{id}  For Update
     * @access  public

    public function requestUser(UserRequest $request, $id = null);
     */

    /**
     * Delete user
     *
     * @param   integer     $id
     *
     * @method  DELETE  api/users/{id}
     * @access  public

    public function deleteUser($id);
     */
}
