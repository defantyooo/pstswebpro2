@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Scores</h1>
    <a href="{{ route('scores.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500">Add Score</a>
</div>

@if(session('success'))
    <div class="mb-4 rounded-lg border border-green-600 bg-green-950 p-4 text-green-200">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-hidden rounded-3xl border border-gray-800 bg-gray-900 shadow-sm">
    <table class="min-w-full divide-y divide-gray-800 text-left text-sm text-gray-200">
        <thead class="bg-gray-950">
            <tr>
                <th class="px-6 py-4 font-semibold">#</th>
                <th class="px-6 py-4 font-semibold">Student</th>
                <th class="px-6 py-4 font-semibold">Subject</th>
                <th class="px-6 py-4 font-semibold">Teacher</th>
                <th class="px-6 py-4 font-semibold">Score</th>
                <th class="px-6 py-4 font-semibold">Recorded At</th>
                <th class="px-6 py-4 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @forelse($scores as $score)
                <tr>
                    <td class="px-6 py-4">{{ $score->id }}</td>
                    <td class="px-6 py-4">{{ $score->student->name ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $score->subject->subject ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $score->teacher->name ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $score->score }}</td>
                    <td class="px-6 py-4">{{ $score->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('scores.edit', $score) }}" class="rounded-lg bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-500">Edit</a>
                        <form action="{{ route('scores.destroy', $score) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-lg bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-500" onclick="return confirm('Delete this score?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-gray-400">No scores recorded yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($scores->hasPages())
<div class="mt-6">
    {{ $scores->links() }}
</div>
@endif
@endsection
