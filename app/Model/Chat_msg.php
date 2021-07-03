<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chat_msg extends Model
{
    protected $table = 'chat_msg';

    protected $fillable = ['msg','sender_id','receiver_id','attachment','file_name','file_type'];
}
