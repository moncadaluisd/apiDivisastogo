<?php

namespace App\Http\Controllers\Api\Plan;

use App\Http\Controllers\Controller;
use App\UserPlan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PlanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $userPlan = UserPlan::where('id_user', $userId)->count();
        $plan = Plan::findOrFail($request->plan_id);
        $wallet = UserWallet::where('id_user', $userId)->first();
         $wallet->wallet;

        if ($wallet->wallet < $plan->price) {
          # code...
          return $this->errorResponse('No tienes suficiente dinero, ve a la seccion de pagos y recarga tu wallet', 401);
        }


        $request['id_user'] = $userId;
        if ($userPlan > 0) {
          # code...
          return $this->errorResponse('No puedes agregar o cambiar de plan hasta que este finalice', 401);
        }
        $wallet->wallet = $wallet->wallet - $plan->price;
        $wallet->save();
        $userPlan = UserPlan::create($request->all());

        $user = User::findOrFail($userId)->with(['plan']);
        return $this->successResponse($user, 'Se ha agregado tu plan satifactoriamente');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
