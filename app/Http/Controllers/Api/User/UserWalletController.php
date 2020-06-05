<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\UserWallet;
use App\User;

class UserWalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::findOrFail(Auth::id())->with(['wallet']);
        return $this->successResponse($user);
    }

}
