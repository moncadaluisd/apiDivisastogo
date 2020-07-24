<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProfileController extends ApiController
{
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::where('username', $id)->first();
        $comments = Review::with(['recipient', 'emitter'])->where('id_user_recipient', $user->id)->latest()->paginate(15);
        
        return $this->successResponse($comments);
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
