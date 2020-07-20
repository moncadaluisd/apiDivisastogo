<?php

use Illuminate\Support\Facades\Broadcast;
use App\AnnouncementRequest;
use App\Announcement;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat.{id}', function ($user, $id) {
  $request = AnnouncementRequest::findOrFail($id);
  $tipo = Announcement::findOrFail($request->id_announcement);
    return (int) Auth::id() === (int) $request->id_user_issuer || (int) Auth::id() === (int) $tipo->id_user;

});

Broadcast::channel('user.id', function ($id) {
    return (int) Auth::id() === (int) $id;
});
