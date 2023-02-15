<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogpostStored extends Model
{
    use HasFactory;

    protected $table = 'blogposts_stored';

    protected $fillable = [
        'text',
        'short_text',
        'title',
        'post_id',
        'post_date',
        'last_parse',
    ];
}

