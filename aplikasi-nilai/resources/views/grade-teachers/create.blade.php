@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Assign Classroom Teacher</h1>
            <p class="text-gray-400">Link a teacher with a classroom.</p>
        </div>
        <a href="{{ route('grade-teachers.index') }}" class="rounded-lg bg-gray-800 px-4 py-2 text-sm text-gray-200 hover:bg-gray-700">Back</a>
    </div>

    @if($errors->any())
        <div class="mb-4 rounded-lg border border-red-600 bg-red-950 p-4 text-red-200">
            <ul class="list-disc space-y-1 pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('grade-teachers.store') }}" method="POST" class="space-y-6 rounded-3xl border border-gray-800 bg-gray-900 p-6">
        @csrf

        <div>
            <label class="mb-2 block text-sm font-semibold text-gray-300">Teacher</label>
            <select name="teacher_id" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required>
                <option value="">-- Select Teacher --</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-gray-300">Classroom</label>
            <select name="classroom_id" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required>
                <option value="">-- Select Classroom --</option>
                @foreach($classrooms as $classroom)
                    <option value="{{ $classroom->id }}" {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>{{ $classroom->classroom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="rounded-2xl bg-indigo-600 px-6 py-3 text-white hover:bg-indigo-500">Assign</button>
    </form>
</div>
@endsection
