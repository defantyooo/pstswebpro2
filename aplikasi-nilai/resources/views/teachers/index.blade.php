@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Teachers</h1>
    <a href="{{ route('teachers.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500">Add Teacher</a>
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
                <th class="px-6 py-4 font-semibold">Photo</th>
                <th class="px-6 py-4 font-semibold">NIP</th>
                <th class="px-6 py-4 font-semibold">Name</th>
                <th class="px-6 py-4 font-semibold">Gender</th>
                <th class="px-6 py-4 font-semibold">Birth Date</th>
                <th class="px-6 py-4 font-semibold">Phone</th>
                <th class="px-6 py-4 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @forelse($teachers as $teacher)
                <tr>
                    <td class="px-6 py-4">{{ $teacher->id }}</td>
                    <td class="px-6 py-4">
                        @if($teacher->photo)
                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" class="h-12 w-12 rounded-lg object-cover">
                        @else
                            <div class="h-12 w-12 rounded-lg bg-gray-800 flex items-center justify-center">
                                <span class="text-xs text-gray-500">No photo</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $teacher->nip }}</td>
                    <td class="px-6 py-4">{{ $teacher->name }}</td>
                    <td class="px-6 py-4">{{ $teacher->gender === 'L' ? 'Male' : 'Female' }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($teacher->birth_date)->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $teacher->phone }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('teachers.edit', $teacher) }}" class="rounded-lg bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-500">Edit</a>
                        <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-lg bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-500" onclick="return confirm('Delete this teacher?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-8 text-center text-gray-400">No teachers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($teachers->hasPages())
<div class="mt-6">
    {{ $teachers->links() }}
</div>
@endif
@endsection
