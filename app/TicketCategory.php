<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    //
    protected $table = 'tickets_categories';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name'
       ];

    public function tickets()
    {
      return $this->hasMany('App\Ticket', 'id_category');
    }
}
