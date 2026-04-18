<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SubjectTeacher;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SubjectTeacherController extends Controller
{
    public function index()
    {
        $assignments = SubjectTeacher::with(['teacher', 'subject'])->latest()->paginate(10);

        return view('subject-teachers.index', compact('assignments'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();

        return view('subject-teachers.create', compact('teachers', 'subjects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'teacher_id' => ['required', 'exists:teachers,id'],
            'subject_id' => [
                'required',
                'exists:subjects,id',
                Rule::unique('subject_teachers')->where(function ($query) use ($request) {
                    return $query->where('teacher_id', $request->teacher_id);
                }),
            ],
        ]);

        DB::transaction(function () use ($data) {
            SubjectTeacher::create($data);
        });

        return redirect()->route('subject-teachers.index')->with('success', 'Subject teacher assignment created successfully.');
    }

    public function destroy(SubjectTeacher $subjectTeacher)
    {
        DB::transaction(function () use ($subjectTeacher) {
            $subjectTeacher->delete();
        });

        return redirect()->route('subject-teachers.index')->with('success', 'Subject teacher assignment removed successfully.');
    }
}
