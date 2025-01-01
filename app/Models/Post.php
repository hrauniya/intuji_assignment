<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable=['title','content','user_id','image_path'];

    public function comments():HasMany{
        return $this->hasMany(Comment::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    
}
