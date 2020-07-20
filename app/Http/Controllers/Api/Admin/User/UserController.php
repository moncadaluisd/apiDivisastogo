<?php

namespace App\Http\Controllers\Api\Admin\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{


    public function index()
    {
      $users = User::paginate(15);
      return $this->successResponse($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user  = User::with(['data', 'plan', 'level', 'payment', 'log', 'preference'])->findOrFail($id);
        return $this->successResponse($user);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        return $this->successResponse($user, 'Se ha eliminado Correctamente');
    }
}
