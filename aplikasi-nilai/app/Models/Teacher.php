<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['nip', 'name', 'gender', 'birth_place', 'birth_date', 'phone', 'photo'];

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'grade_teachers');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_teachers');
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
