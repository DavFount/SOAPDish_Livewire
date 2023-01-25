<?php

namespace App\Models;

use App\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, HasComments;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent() {
        return $this->morphTo('commentable');
    }
}
