<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherChoice extends Model
{
    protected $fillable = [ 'question_id', 'content' ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::Class);
    }
}
