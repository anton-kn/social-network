<?php

namespace App\Models;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessBook extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'client_id'];

    /* Доступы  */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
