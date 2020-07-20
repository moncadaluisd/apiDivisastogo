<?php

namespace App\Http\Controllers\Api\Announcement;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Announcement;
use App\Http\Requests\Announcement\AnnouncementRequest as Request;

class CreateAnnouncementController extends ApiController
{

    public function __construct()
    {
      $this->middleware('rol:3');
    }
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
        $currency = Announcement::where([
          ['id_user', Auth::id()],
          ['id_currency_from', $request->id_currency_from],
          ['id_currency_to', $request->id_currency_to],
          ['id_category', $request->id_category]
        ])->count();
        if ($currency > 0) {
          # code...
          return $this->errorResponse('No puedes crear mas posts con estas monedas', 401);
        }

        if ($request->id_currency_from == $request->id_currency_to ) {
          # code...
          return $this->errorResponse('No puedes crear un post con las monedas iguales', 401);
        }
        $announcement = Announcement::create($request->all());
        $data = Announcement::with('user', 'category', 'currencyFrom', 'currencyTo')->findOrFail($announcement->id);
        return $this->successResponse($data, 'Se ha creado correctamente');

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
                                        ->firstOrFail()
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
        $announcement= Announcement::where('id_user', Auth::id())->where('id', $id)->firstOrFail();
        $announcement->delete();
        return $this->successResponse($announcement, 'Se ha eliminado correctamente');
    }

    public function getBuyer()
    {
      $announcement = Announcement::with('user', 'category', 'currencyFrom', 'currencyTo')->where('id_user', Auth::id())->paginate(8);
      return $this->successResponse($announcement);
    }
}
