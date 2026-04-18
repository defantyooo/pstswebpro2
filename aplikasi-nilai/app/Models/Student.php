<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nis', 'name', 'gender', 'birth_place', 'birth_date', 'classroom_id', 'photo'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
