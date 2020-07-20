<?php

namespace App\Http\Controllers\Api\Announcement;

use App\Http\Controllers\ApiController;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerRequestController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $announcement = Announcement::where('id_user', Auth::id())
        ->leftJoin('announcements_request', 'announcements.id', '=', 'announcements_request.id_announcement')
        ->leftJoin('users', 'announcements_request.id_user_issuer', '=', 'users.id')
        ->leftJoin('currencies as cf', 'announcements.id_currency_from', '=', 'cf.id')
        ->leftJoin('currencies as ct', 'announcements.id_currency_to', '=', 'ct.id')
        ->where('announcements_request.state', '=', 1)
        ->select('announcements.title','announcements_request.*', 'users.username', 'cf.name as currencyFromName', 'cf.iso as currencyFromIso' , 'ct.name as currencyToName', 'ct.iso as currencyToIso')
        ->paginate(10);
      return $this->successResponse($announcement);
    }


    /**
     * Searching Buyer Announcement Requests
     *
     * @return \App\Traits\ApiResponser
     */

     public function search($state,$category){
       $announcement = Announcement::where('id_user', Auth::id())
         ->leftJoin('announcements_request', 'announcements.id', '=', 'announcements_request.id_announcement')
         ->leftJoin('users', 'announcements_request.id_user_issuer', '=', 'users.id')
         ->leftJoin('currencies as cf', 'announcements.id_currency_from', '=', 'cf.id')
         ->leftJoin('currencies as ct', 'announcements.id_currency_to', '=', 'ct.id')
         ->where([
           ['announcements_request.state', '=', $state],
           ['announcements.id_category', '=', $category]
         ])
         ->select('announcements.title','announcements_request.*', 'users.username', 'cf.name as currencyFromName', 'cf.iso as currencyFromIso' , 'ct.name as currencyToName', 'ct.iso as currencyToIso')
         ->latest()
         ->paginate(15);

         return $this->successResponse($announcement);
     }




}
