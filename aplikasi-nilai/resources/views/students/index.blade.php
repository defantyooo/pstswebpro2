@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Students</h1>
    <a href="{{ route('students.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500">Add Student</a>
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
                <th class="px-6 py-4 font-semibold">NIS</th>
                <th class="px-6 py-4 font-semibold">Name</th>
                <th class="px-6 py-4 font-semibold">Gender</th>
                <th class="px-6 py-4 font-semibold">Birth Date</th>
                <th class="px-6 py-4 font-semibold">Classroom</th>
                <th class="px-6 py-4 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @forelse($students as $student)
                <tr>
                    <td class="px-6 py-4">{{ $student->id }}</td>
                    <td class="px-6 py-4">
                        @if($student->photo)
                            <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}" class="h-12 w-12 rounded-lg object-cover">
                        @else
                            <div class="h-12 w-12 rounded-lg bg-gray-800 flex items-center justify-center">
                                <span class="text-xs text-gray-500">No photo</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4">{{ $student->nis }}</td>
                    <td class="px-6 py-4">{{ $student->name }}</td>
                    <td class="px-6 py-4">{{ $student->gender === 'L' ? 'Male' : 'Female' }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($student->birth_date)->format('d M Y') }}</td>
                    <td class="px-6 py-4">{{ $student->classroom->classroom }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('students.edit', $student) }}" class="rounded-lg bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-500">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-lg bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-500" onclick="return confirm('Delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-gray-400">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($students->hasPages())
<div class="mt-6">
    {{ $students->links() }}
</div>
@endif
@endsection
