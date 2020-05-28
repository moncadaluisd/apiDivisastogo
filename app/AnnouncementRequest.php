<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementRequest extends Model
{
    //
    protected $table = 'announcements_request';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_announcement', 'id_user_recipient', 'moment', 'amount', 'rate', 'pay', 'state'
       ];
}
