<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','post_id','user_id'];

    public function post():BelongsTo{
        return $this->belongsTo(Post::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
