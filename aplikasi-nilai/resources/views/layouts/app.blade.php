<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Nilai</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-gray-200">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-black border-r border-gray-800">
        <div class="p-6 font-bold text-xl border-b border-gray-800">
            📊 Aplikasi Nilai
        </div>

        <nav class="p-4 space-y-2">
            <a href="/" class="block px-3 py-2 rounded-lg hover:bg-gray-900 transition">Dashboard</a>
            <a href="{{ route('classrooms.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-900 transition">Classrooms</a>
            <a href="{{ route('students.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-900 transition">Students</a>
            <a href="{{ route('teachers.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-900 transition">Teachers</a>
            <a href="{{ route('subjects.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-900 transition">Subjects</a>
            <a href="{{ route('grade-teachers.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-900 transition">Classroom Teachers</a>
            <a href="{{ route('subject-teachers.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-900 transition">Subject Teachers</a>
            <a href="{{ route('scores.index') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-900 transition">Scores</a>
        </nav>
    </aside>

    <!-- Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>