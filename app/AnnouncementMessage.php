<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementMessage extends Model
{
    //
    protected $table = 'announcements_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_request', 'id_user', 'moment', 'message', 'upload'
       ];
}
