<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Borrowed extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'borroweds';

    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
