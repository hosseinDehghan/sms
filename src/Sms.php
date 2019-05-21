<?php

namespace Hosein\Sms;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $fillable=[
        'id','name','family','tell'
    ];
}
