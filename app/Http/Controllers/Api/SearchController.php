<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\User;
use App\Announcement;
use Illuminate\Http\Request;

class SearchController extends ApiController
{

  public function profileSearch($username)
  {
    $user = User::where('username', $username)->firstOrFail();
    $announcementRequest = Announcement::where('id_user', $user->id)
      ->leftJoin('announcements_request', 'announcements.id', '=', 'announcements_request.id_announcement')
      ->leftJoin('users', 'announcements_request.id_user_issuer', '=', 'users.id')
      ->leftJoin('currencies as cf', 'announcements.id_currency_from', '=', 'cf.id')
      ->leftJoin('currencies as ct', 'announcements.id_currency_to', '=', 'ct.id')
      ->where([
        ['announcements_request.state', '>', 1],
      ])
      ->select('announcements.title','announcements_request.*', 'users.username', 'cf.name as currencyFromName', 'cf.iso as currencyFromIso' , 'ct.name as currencyToName', 'ct.iso as currencyToIso')
      ->latest()
      ->paginate(15);


      return $this->successResponse($announcementRequest);
  }

  public function profileSearchUsername($username)
  {
    $user = User::where('username', $username)->select(['username'])->firstOrFail();
    return $this->successResponse($user);
  }
}
