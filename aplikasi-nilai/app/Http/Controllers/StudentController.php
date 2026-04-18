<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classroom')->latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classrooms = Classroom::all();

        return view('students.create', compact('classrooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nis' => ['required', 'string', 'max:25', 'unique:students,nis'],
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:L,P'],
            'birth_place' => ['required', 'string', 'max:50'],
            'birth_date' => ['required', 'date'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('students', 'public');
        }

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        $classrooms = Classroom::all();

        return view('students.edit', compact('student', 'classrooms'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'nis' => ['required', 'string', 'max:25', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:L,P'],
            'birth_place' => ['required', 'string', 'max:50'],
            'birth_date' => ['required', 'date'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('students', 'public');
        }

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
