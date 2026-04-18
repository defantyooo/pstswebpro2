<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['subject', 'sks'];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'subject_teachers');
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
