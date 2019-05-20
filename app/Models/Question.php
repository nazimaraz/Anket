<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [ 'content', 'poll_id' ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
