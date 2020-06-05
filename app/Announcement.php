<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $table = 'announcements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id_user', 'id_currency_from', 'id_currency_to', 'id_category', 'title', 'description', 'price', 'min', 'max', 'percetange',
          'state'
       ];


      public function user()
      {
        return $this->belongsTo('App\User', 'id_user');
      }

      public function currencyFrom()
      {
        return $this->belongsTo('App\Currency', 'id_currency_from');
      }

      public function currencyTo()
      {
        return $this->belongsTo('App\Currency', 'id_currency_to');
      }

      public function category()
      {
        return $this->belongsTo('App\Category', 'id_user');
      }


}
