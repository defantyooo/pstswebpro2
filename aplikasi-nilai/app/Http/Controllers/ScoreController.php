<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function index()
    {
        $scores = Score::with(['student', 'subject', 'teacher'])->latest()->paginate(10);

        return view('scores.index', compact('scores'));
    }

    public function create()
    {
        $students = Student::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('scores.create', compact('students', 'subjects', 'teachers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'score' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        DB::transaction(function () use ($data) {
            Score::create($data);
        });

        return redirect()->route('scores.index')->with('success', 'Score saved successfully.');
    }

    public function edit(Score $score)
    {
        $students = Student::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('scores.edit', compact('score', 'students', 'subjects', 'teachers'));
    }

    public function update(Request $request, Score $score)
    {
        $data = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'teacher_id' => ['required', 'exists:teachers,id'],
            'score' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        DB::transaction(function () use ($score, $data) {
            $score->update($data);
        });

        return redirect()->route('scores.index')->with('success', 'Score updated successfully.');
    }

    public function destroy(Score $score)
    {
        DB::transaction(function () use ($score) {
            $score->delete();
        });

        return redirect()->route('scores.index')->with('success', 'Score deleted successfully.');
    }
}
