@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Edit Classroom</h1>
            <p class="text-gray-400">Update classroom details.</p>
        </div>
        <a href="{{ route('classrooms.index') }}" class="rounded-lg bg-gray-800 px-4 py-2 text-sm text-gray-200 hover:bg-gray-700">Back</a>
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

    <form action="{{ route('classrooms.update', $classroom) }}" method="POST" class="space-y-6 rounded-3xl border border-gray-800 bg-gray-900 p-6">
        @csrf
        @method('PUT')

        <div>
            <label class="mb-2 block text-sm font-semibold text-gray-300">Classroom Name</label>
            <input type="text" name="classroom" value="{{ old('classroom', $classroom->classroom) }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required maxlength="50">
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-300">Capacity</label>
                <input type="number" name="capacity" value="{{ old('capacity', $classroom->capacity) }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required min="0">
            </div>
            <div>
                <label class="mb-2 block text-sm font-semibold text-gray-300">Filled</label>
                <input type="number" name="filled" value="{{ old('filled', $classroom->filled) }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required min="0">
            </div>
        </div>

        <button type="submit" class="rounded-2xl bg-indigo-600 px-6 py-3 text-white hover:bg-indigo-500">Update Classroom</button>
    </form>
</div>
@endsection
