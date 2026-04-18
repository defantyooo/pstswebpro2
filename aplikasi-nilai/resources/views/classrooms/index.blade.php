@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Classrooms</h1>
    <a href="{{ route('classrooms.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500">Add Classroom</a>
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
                <th class="px-6 py-4 font-semibold">Classroom</th>
                <th class="px-6 py-4 font-semibold">Capacity</th>
                <th class="px-6 py-4 font-semibold">Filled</th>
                <th class="px-6 py-4 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @forelse($classrooms as $classroom)
                <tr>
                    <td class="px-6 py-4">{{ $classroom->id }}</td>
                    <td class="px-6 py-4">{{ $classroom->classroom }}</td>
                    <td class="px-6 py-4">{{ $classroom->capacity }}</td>
                    <td class="px-6 py-4">{{ $classroom->filled }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('classrooms.edit', $classroom) }}" class="rounded-lg bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-500">Edit</a>
                        <form action="{{ route('classrooms.destroy', $classroom) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-lg bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-500" onclick="return confirm('Delete this classroom?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-400">No classrooms found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    {{ $classrooms->links() }}
</div>
@endsection
