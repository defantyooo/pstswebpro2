<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GradeTeacherController;
use App\Http\Controllers\SubjectTeacherController;
use App\Http\Controllers\ScoreController;
use App\Models\Classroom;
use App\Models\GradeTeacher;
use App\Models\Score;
use App\Models\Subject;
use App\Models\SubjectTeacher;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard', [
        'classroomsCount' => Classroom::count(),
        'studentsCount' => Student::count(),
        'teachersCount' => Teacher::count(),
        'subjectsCount' => Subject::count(),
        'gradeTeachersCount' => GradeTeacher::count(),
        'subjectTeachersCount' => SubjectTeacher::count(),
        'scoresCount' => Score::count(),
    ]);
});

Route::resource('classrooms', ClassroomController::class)->except(['show']);
Route::resource('students', StudentController::class)->except(['show']);
Route::resource('teachers', TeacherController::class)->except(['show']);
Route::resource('subjects', SubjectController::class)->except(['show']);
Route::resource('grade-teachers', GradeTeacherController::class)->only(['index', 'create', 'store', 'destroy']);
Route::resource('subject-teachers', SubjectTeacherController::class)->only(['index', 'create', 'store', 'destroy']);
Route::resource('scores', ScoreController::class)->except(['show']);
