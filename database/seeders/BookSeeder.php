<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['judul' => 'Laravel untuk Pemula', 'penulis' => 'Budi Santoso', 'tahun' => 2021, 'cover' => null],
            ['judul' => 'Belajar PHP Modern', 'penulis' => 'Andi Wijaya', 'tahun' => 2020, 'cover' => null],
            ['judul' => 'Clean Code', 'penulis' => 'Robert C. Martin', 'tahun' => 2008, 'cover' => null],
            ['judul' => 'The Pragmatic Programmer', 'penulis' => 'David Thomas', 'tahun' => 2019, 'cover' => null],
            ['judul' => 'Design Patterns', 'penulis' => 'Gang of Four', 'tahun' => 1994, 'cover' => null],
            ['judul' => 'You Don\'t Know JS', 'penulis' => 'Kyle Simpson', 'tahun' => 2015, 'cover' => null],
            ['judul' => 'Database Systems', 'penulis' => 'Ramez Elmasri', 'tahun' => 2016, 'cover' => null],
            ['judul' => 'Algoritma dan Pemrograman', 'penulis' => 'Rinaldi Munir', 'tahun' => 2018, 'cover' => null],
            ['judul' => 'Web Programming', 'penulis' => 'Didik Dwi Prasetyo', 'tahun' => 2022, 'cover' => null],
            ['judul' => 'Struktur Data', 'penulis' => 'Bambang Wahyudi', 'tahun' => 2017, 'cover' => null],
            ['judul' => 'Kecerdasan Buatan', 'penulis' => 'Suyanto', 'tahun' => 2019, 'cover' => null],
            ['judul' => 'Jaringan Komputer', 'penulis' => 'Forouzan', 'tahun' => 2013, 'cover' => null],
            ['judul' => 'Sistem Operasi', 'penulis' => 'Tanenbaum', 'tahun' => 2014, 'cover' => null],
            ['judul' => 'Pemrograman Berorientasi Objek', 'penulis' => 'Hermawan', 'tahun' => 2020, 'cover' => null],
            ['judul' => 'Rekayasa Perangkat Lunak', 'penulis' => 'Rosa A.S', 'tahun' => 2016, 'cover' => null],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}