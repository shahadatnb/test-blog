<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $fillables = [
    	'sender_id', 'receiver_id','subject','message','read'
    ]
}
