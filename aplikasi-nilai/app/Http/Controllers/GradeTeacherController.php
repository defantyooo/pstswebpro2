<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\GradeTeacher;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GradeTeacherController extends Controller
{
    public function index()
    {
        $assignments = GradeTeacher::with(['teacher', 'classroom'])->latest()->paginate(10);

        return view('grade-teachers.index', compact('assignments'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $classrooms = Classroom::all();

        return view('grade-teachers.create', compact('teachers', 'classrooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'teacher_id' => ['required', 'exists:teachers,id'],
            'classroom_id' => [
                'required',
                'exists:classrooms,id',
                Rule::unique('grade_teachers')->where(function ($query) use ($request) {
                    return $query->where('teacher_id', $request->teacher_id);
                }),
            ],
        ]);

        DB::transaction(function () use ($data) {
            GradeTeacher::create($data);
        });

        return redirect()->route('grade-teachers.index')->with('success', 'Classroom teacher assignment created successfully.');
    }

    public function destroy(GradeTeacher $gradeTeacher)
    {
        DB::transaction(function () use ($gradeTeacher) {
            $gradeTeacher->delete();
        });

        return redirect()->route('grade-teachers.index')->with('success', 'Classroom teacher assignment removed successfully.');
    }
}
