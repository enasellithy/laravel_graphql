<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'title', 'author_id', 'content'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
