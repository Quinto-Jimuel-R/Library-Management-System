<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'books';

    protected $fillable = [
        'book_code',
        'title',
        'author',
        'genre',
        'status',
    ];

    public function borrow()
    {
        return $this->hasMany(Borrowed::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
