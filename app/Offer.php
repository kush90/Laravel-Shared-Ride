<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected  $fillable=[
        'user_id',
        'from',
        'to',
        'date',
        'time',
        'seat',
        'gender',
    ];
}
