@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Classroom Teachers</h1>
    <a href="{{ route('grade-teachers.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500">Assign Teacher</a>
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
                <th class="px-6 py-4 font-semibold">Teacher</th>
                <th class="px-6 py-4 font-semibold">Classroom</th>
                <th class="px-6 py-4 font-semibold">Assigned At</th>
                <th class="px-6 py-4 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @forelse($assignments as $assignment)
                <tr>
                    <td class="px-6 py-4">{{ $assignment->id }}</td>
                    <td class="px-6 py-4">{{ $assignment->teacher->name ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $assignment->classroom->classroom ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $assignment->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <form action="{{ route('grade-teachers.destroy', $assignment) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-lg bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-500" onclick="return confirm('Remove this assignment?')">Remove</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">No assignments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($assignments->hasPages())
<div class="mt-6">
    {{ $assignments->links() }}
</div>
@endif
@endsection
