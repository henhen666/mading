<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;
use App\Models\DaaiTV;
use App\Models\Pengumuman;
use App\Models\Kelas;
use App\Models\Marquee;
use App\Models\PengumumanCategory;
use App\Models\RekapAbsen;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'kelas' => 'X AKL'
        ]);
        Kelas::create([
            'kelas' => 'X OTKP'
        ]);
        Kelas::create([
            'kelas' => 'X RPL 1'
        ]);
        Kelas::create([
            'kelas' => 'X RPL 2'
        ]);
        Kelas::create([
            'kelas' => 'XI AKL'
        ]);
        Kelas::create([
            'kelas' => 'XI OTKP'
        ]);
        Kelas::create([
            'kelas' => 'XI RPL 1'
        ]);
        Kelas::create([
            'kelas' => 'XI RPL 2'
        ]);
        Kelas::create([
            'kelas' => 'XII AKL'
        ]);
        Kelas::create([
            'kelas' => 'XII OTKP'
        ]);
        Kelas::create([
            'kelas' => 'XII RPL'
        ]);

        Category::create([
            'category' => "Programming",
            'slug' => "programming"
        ]);

        Category::create([
            'category' => "Accounting",
            'slug' => "accounting"
        ]);
        Category::create([
            'category' => "Office",
            'slug' => 'office'
        ]);
        Category::create([
            'category' => "e-Sports",
            'slug' => 'e-sport'
        ]);
        Category::create([
            'category' => "Health",
            'slug' => 'health'
        ]);

        DaaiTV::create([
            'links' =>  'https://www.youtube.com/embed/hpZkg4hz-vo'
        ]);

        User::create([
            'username'      => 'Admin',
            'email'         => 'admin@email.com',
            'password'      => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' //passwoerd
        ]);

        User::factory(10)->create();

        Article::factory(20)->create();

        Pengumuman::factory(12)->create();

        PengumumanCategory::create([
            'category_pengumuman' => "OSIS"
        ]);
        PengumumanCategory::create([
            'category_pengumuman' => "Siswa"
        ]);
    }
}
