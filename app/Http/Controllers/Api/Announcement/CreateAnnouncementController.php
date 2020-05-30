<?php

namespace App\Http\Controllers\Api\Announcement;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Announcement;
use App\Http\Requests\Announcement\AnnouncementRequest as Request;

class CreateAnnouncementController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $announcement = Announcement::where('id_user', Auth::id())->paginate(15);
        return $this->successResponse($announcement);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request['id_user'] = Auth::id();
        $announcement = Announcement::create($request->all());
        return $this->successResponse($announcement, 'Se ha creado correctamente');

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
        $request['id_user'] = Auth::id();
        $announcement = Announcement::where('id_user', Auth::id())
                                        ->where('id', $id)
                                        ->first()
                                        ->update($request->all());
        return $this->successResponse($announcement, 'Se ha actualizado correctamente');
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
