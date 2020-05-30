<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    //
    protected $table = 'tickets_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_ticket', 'id_user', 'type', 'message', 'upload'
       ];
}
