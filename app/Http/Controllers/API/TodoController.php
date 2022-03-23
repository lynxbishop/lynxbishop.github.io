<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\TodoInterface;
//use App\Http\Requests\UserRequest;

class TodoController extends Controller
{
    protected $todoInteface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(TodoInterface $userInterface)
    {
        $this->todoInterface = $userInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->todoInterface->getAll($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(UserRequest $request)
    {
        return $this->todoInterface->requestUser($request);
    }
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        return $this->todoInterface->getById($id);
    }
     

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(UserRequest $request, $id)
    {
        return $this->todoInterface->requestUser($request, $id);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->todoInterface->deleteUser($id);
    }
    
}
