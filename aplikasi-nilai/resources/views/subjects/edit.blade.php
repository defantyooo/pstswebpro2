@extends('layouts.app')

@section('content')
<div class="max-w-2xl">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold">Edit Subject</h1>
            <p class="text-gray-400">Update subject details.</p>
        </div>
        <a href="{{ route('subjects.index') }}" class="rounded-lg bg-gray-800 px-4 py-2 text-sm text-gray-200 hover:bg-gray-700">Back</a>
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

    <form action="{{ route('subjects.update', $subject) }}" method="POST" class="space-y-6 rounded-3xl border border-gray-800 bg-gray-900 p-6">
        @csrf
        @method('PUT')

        <div>
            <label class="mb-2 block text-sm font-semibold text-gray-300">Subject Name</label>
            <input type="text" name="subject" value="{{ old('subject', $subject->subject) }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required maxlength="100">
        </div>

        <div>
            <label class="mb-2 block text-sm font-semibold text-gray-300">SKS</label>
            <input type="number" name="sks" value="{{ old('sks', $subject->sks) }}" class="w-full rounded-2xl border border-gray-800 bg-gray-950 px-4 py-3 text-gray-200 focus:border-indigo-500 focus:outline-none" required min="0">
        </div>

        <button type="submit" class="rounded-2xl bg-indigo-600 px-6 py-3 text-white hover:bg-indigo-500">Update Subject</button>
    </form>
</div>
@endsection
