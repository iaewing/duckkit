<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'duck', //karma equivalent
        'subduckkit_id'
    ];

    protected $attributes = [
        'duck' => 1
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subduckkit()
    {
        return $this->belongsTo(Subduckkit::class);
    }
}
