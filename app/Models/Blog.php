<?php
namespace App\Models;
class Blog{
    protected $fillable = [
        'id',
        'title',
        'user_id',
        'content',
        'created_at',
        'updated_at'
    ];
}