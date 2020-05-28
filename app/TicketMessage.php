<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    //
    protected $table = 'tickets_messages';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_ticket', 'id_user', 'type', 'moment', 'message', 'upload'
       ];
}
