<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementRequest extends Model
{
    //
    protected $table = 'announcements_request';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_announcement', 'id_user_issuer', 'amount', 'pay', 'stateIssuer', 'stateRecipient', 'price', 'min', 'max'
       ];

       public function announcement()
       {
         return $this->belongsTo('App\Announcement', 'id_announcement');
       }

       public function message()
       {
         return $this->hasMany('App\AnnouncementMessage', 'id_request');
       }
}
