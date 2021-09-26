<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'author_id', 'topic', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
