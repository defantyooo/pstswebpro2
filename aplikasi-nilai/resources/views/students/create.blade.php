@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">New Student</h1>
            <p class="text-gray-400">Create a new student record.</p>
        </div>
        <a href="{{ route('students.index') }}" class="rounded-lg bg-gray-800 px-4 py-2 text-sm text-gray-200 hover:bg-gray-700">Back</a>
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

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 rounded-3xl border border-gray-800 bg-gray-900 p-6">
        @csrf

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-300">NIS (Student ID)</label>
                <input type="text" name="nis" value="{{ old('nis') }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required maxlength="25">
            </div>
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-300">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required maxlength="100">
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-300">Gender</label>
                <select name="gender" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required>
                    <option value="">-- Select Gender --</option>
                    <option value="L" {{ old('gender') === 'L' ? 'selected' : '' }}>Male</option>
                    <option value="P" {{ old('gender') === 'P' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-300">Birth Place</label>
                <input type="text" name="birth_place" value="{{ old('birth_place') }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required maxlength="50">
            </div>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-300">Birth Date</label>
                <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required>
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
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-gray-300">Photo</label>
            <input type="file" name="photo" accept="image/*" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none">
            <p class="mt-1 text-xs text-gray-400">Max 2MB. Optional.</p>
        </div>

        <button type="submit" class="rounded-2xl bg-indigo-600 px-6 py-3 text-white hover:bg-indigo-500">Save Student</button>
    </form>
</div>
@endsection
