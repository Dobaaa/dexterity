<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    // اسم الجدول لو مختلف عن اسم الموديل
    protected $table = 'emails';

    // الأعمدة اللي ممكن نعمل لها fill مباشرة
    protected $fillable = [
        'message_id',
        'subject',
        'body',
        'from_email',
        'from_name',
        'to_email',
        'date'
    ];
}