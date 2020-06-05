<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'id_category', 'message', 'upload', 'state',
    ];

    public function user()
    {
      return $this->belongsTo('App\User', 'id_user');
    }

    public function category()
    {
      return $this->belongsTo('App\TicketCategory', 'id_category');
    }

    public function ticket()
    {
      return $this->hasMany('App\TicketMessage', 'id_ticket');
    }
}
