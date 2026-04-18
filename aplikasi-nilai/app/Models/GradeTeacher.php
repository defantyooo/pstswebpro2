<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GradeTeacher extends Model
{
    protected $fillable = ['teacher_id', 'classroom_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
