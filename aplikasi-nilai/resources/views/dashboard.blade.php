@extends('layouts.app')

@section('content')

<div class="mb-10 rounded-[2rem] border border-gray-800 bg-gradient-to-br from-slate-950 via-slate-900 to-indigo-950 p-8 shadow-2xl shadow-indigo-950/20">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.36em] text-indigo-400">Welcome back</p>
            <h1 class="mt-3 text-4xl font-semibold tracking-tight text-white sm:text-5xl">Welcome to Aplikasi Nilai</h1>
            <p class="mt-4 max-w-2xl text-gray-300">An App to place your students grades. Manage classrooms, teachers, subjects, assignments, and scores from one central dashboard.</p>
        </div>
        <div class="rounded-3xl border border-indigo-500/20 bg-indigo-950/40 p-6 text-center shadow-lg shadow-indigo-950/30">
            <p class="text-sm uppercase tracking-[0.3em] text-indigo-300">Dashboard Pulse</p>
            <div class="mt-5 text-5xl font-bold text-white">{{ $scoresCount }}</div>
            <p class="mt-2 text-sm text-gray-400">Total scores logged</p>
        </div>
    </div>
</div>

<div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
    <div class="group rounded-[2rem] border border-gray-800 bg-gray-950 p-6 shadow-xl shadow-slate-950/40 transition duration-300 hover:-translate-y-1 hover:border-indigo-500/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400">Classrooms</p>
                <h2 class="mt-3 text-3xl font-semibold text-white">{{ $classroomsCount }}</h2>
            </div>
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-500/10 text-indigo-400">
                <span class="text-xl">🏫</span>
            </div>
        </div>
        <div class="mt-4 h-2 overflow-hidden rounded-full bg-gray-800">
            <div class="h-full w-3/4 rounded-full bg-indigo-500 transition-all duration-500"></div>
        </div>
    </div>

    <div class="group rounded-[2rem] border border-gray-800 bg-gray-950 p-6 shadow-xl shadow-slate-950/40 transition duration-300 hover:-translate-y-1 hover:border-emerald-500/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400">Students</p>
                <h2 class="mt-3 text-3xl font-semibold text-white">{{ $studentsCount }}</h2>
            </div>
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/10 text-emerald-400">
                <span class="text-xl">🎓</span>
            </div>
        </div>
        <div class="mt-4 h-2 overflow-hidden rounded-full bg-gray-800">
            <div class="h-full w-11/12 rounded-full bg-emerald-500 transition-all duration-500"></div>
        </div>
    </div>

    <div class="group rounded-[2rem] border border-gray-800 bg-gray-950 p-6 shadow-xl shadow-slate-950/40 transition duration-300 hover:-translate-y-1 hover:border-cyan-500/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400">Teachers</p>
                <h2 class="mt-3 text-3xl font-semibold text-white">{{ $teachersCount }}</h2>
            </div>
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-500/10 text-cyan-400">
                <span class="text-xl">👩‍🏫</span>
            </div>
        </div>
        <div class="mt-4 h-2 overflow-hidden rounded-full bg-gray-800">
            <div class="h-full w-2/3 rounded-full bg-cyan-500 transition-all duration-500"></div>
        </div>
    </div>

    <div class="group rounded-[2rem] border border-gray-800 bg-gray-950 p-6 shadow-xl shadow-slate-950/40 transition duration-300 hover:-translate-y-1 hover:border-fuchsia-500/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-400">Subjects</p>
                <h2 class="mt-3 text-3xl font-semibold text-white">{{ $subjectsCount }}</h2>
            </div>
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-fuchsia-500/10 text-fuchsia-400">
                <span class="text-xl">📚</span>
            </div>
        </div>
        <div class="mt-4 h-2 overflow-hidden rounded-full bg-gray-800">
            <div class="h-full w-5/6 rounded-full bg-fuchsia-500 transition-all duration-500"></div>
        </div>
    </div>
</div>

<div class="grid gap-6 lg:grid-cols-3 mt-6">
    <div class="rounded-[2rem] border border-gray-800 bg-gray-950 p-6 shadow-xl shadow-slate-950/40 transition duration-300 hover:-translate-y-1 hover:border-amber-500/50">
        <p class="text-sm text-gray-400">Classroom Teacher Assignments</p>
        <h2 class="mt-3 text-3xl font-semibold text-white">{{ $gradeTeachersCount }}</h2>
    </div>
    <div class="rounded-[2rem] border border-gray-800 bg-gray-950 p-6 shadow-xl shadow-slate-950/40 transition duration-300 hover:-translate-y-1 hover:border-sky-500/50">
        <p class="text-sm text-gray-400">Subject Teacher Assignments</p>
        <h2 class="mt-3 text-3xl font-semibold text-white">{{ $subjectTeachersCount }}</h2>
    </div>
    <div class="rounded-[2rem] border border-gray-800 bg-gray-950 p-6 shadow-xl shadow-slate-950/40 transition duration-300 hover:-translate-y-1 hover:border-emerald-500/50">
        <p class="text-sm text-gray-400">Scores Recorded</p>
        <h2 class="mt-3 text-3xl font-semibold text-white">{{ $scoresCount }}</h2>
    </div>
</div>

@endsection