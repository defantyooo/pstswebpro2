<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitialDataSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->insert([
            ['classroom' => 'X TKJ 1', 'capacity' => 30, 'filled' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['classroom' => 'X RPL 1', 'capacity' => 32, 'filled' => 32, 'created_at' => now(), 'updated_at' => now()],
            ['classroom' => 'XI TKJ 1', 'capacity' => 30, 'filled' => 28, 'created_at' => now(), 'updated_at' => now()],
            ['classroom' => 'XI RPL 1', 'capacity' => 28, 'filled' => 27, 'created_at' => now(), 'updated_at' => now()],
            ['classroom' => 'XII TKJ 1', 'capacity' => 30, 'filled' => 29, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('subjects')->insert([
            ['subject' => 'Matematika', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['subject' => 'Bahasa Indonesia', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['subject' => 'IPA', 'sks' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['subject' => 'Bahasa Inggris', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['subject' => 'Sejarah', 'sks' => 2, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('teachers')->insert([
            ['nip' => '198405092010011001', 'name' => 'Budi Santoso', 'gender' => 'L', 'birth_place' => 'Jakarta', 'birth_date' => '1984-05-09', 'phone' => '081234567890', 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
            ['nip' => '197903062009011002', 'name' => 'Siti Aminah', 'gender' => 'P', 'birth_place' => 'Bandung', 'birth_date' => '1979-03-06', 'phone' => '082345678901', 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
            ['nip' => '198701152011011003', 'name' => 'Andi Pratama', 'gender' => 'L', 'birth_place' => 'Semarang', 'birth_date' => '1987-01-15', 'phone' => '083456789012', 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
            ['nip' => '199002022012011004', 'name' => 'Nina Kusuma', 'gender' => 'P', 'birth_place' => 'Surabaya', 'birth_date' => '1990-02-02', 'phone' => '084567890123', 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
            ['nip' => '198912152013011005', 'name' => 'Rizky Prasetyo', 'gender' => 'L', 'birth_place' => 'Medan', 'birth_date' => '1989-12-15', 'phone' => '085678901234', 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('students')->insert([
            ['nis' => '2026101001', 'name' => 'Andi Wijaya', 'gender' => 'L', 'birth_place' => 'Surabaya', 'birth_date' => '2008-01-15', 'classroom_id' => 1, 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '2026101002', 'name' => 'Dewi Putri', 'gender' => 'P', 'birth_place' => 'Malang', 'birth_date' => '2008-02-20', 'classroom_id' => 2, 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '2026101003', 'name' => 'Rian Pratama', 'gender' => 'L', 'birth_place' => 'Yogyakarta', 'birth_date' => '2008-03-12', 'classroom_id' => 1, 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '2026101004', 'name' => 'Sari Melati', 'gender' => 'P', 'birth_place' => 'Bandung', 'birth_date' => '2008-04-25', 'classroom_id' => 3, 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
            ['nis' => '2026101005', 'name' => 'Fajar Hidayat', 'gender' => 'L', 'birth_place' => 'Jakarta', 'birth_date' => '2008-05-30', 'classroom_id' => 4, 'photo' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('grade_teachers')->insert([
            ['teacher_id' => 1, 'classroom_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['teacher_id' => 2, 'classroom_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['teacher_id' => 3, 'classroom_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['teacher_id' => 4, 'classroom_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['teacher_id' => 5, 'classroom_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('subject_teachers')->insert([
            ['teacher_id' => 1, 'subject_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['teacher_id' => 1, 'subject_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['teacher_id' => 2, 'subject_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['teacher_id' => 3, 'subject_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['teacher_id' => 4, 'subject_id' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('scores')->insert([
            ['student_id' => 1, 'subject_id' => 1, 'teacher_id' => 1, 'score' => 88, 'created_at' => now(), 'updated_at' => now()],
            ['student_id' => 2, 'subject_id' => 2, 'teacher_id' => 2, 'score' => 92, 'created_at' => now(), 'updated_at' => now()],
            ['student_id' => 3, 'subject_id' => 3, 'teacher_id' => 1, 'score' => 84, 'created_at' => now(), 'updated_at' => now()],
            ['student_id' => 4, 'subject_id' => 4, 'teacher_id' => 3, 'score' => 90, 'created_at' => now(), 'updated_at' => now()],
            ['student_id' => 5, 'subject_id' => 5, 'teacher_id' => 4, 'score' => 86, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
