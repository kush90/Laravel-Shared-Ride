<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRide extends Model
{
   protected $fillable=[
       'offer_id',
       'user_id',
   ];
}
