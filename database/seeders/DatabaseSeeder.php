<?php

namespace Database\Seeders;

use App\Models\Bts;
use App\Models\User;
use App\Models\FotoBts;
use App\Models\Pemilik;
use App\Models\Wilayah;
use App\Models\JenisBts;
use App\Models\KondisiBts;
use App\Models\Monitoring;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'role' => 'admin'
        ]);
        
        User::factory(5)->create();
        Pemilik::factory(10)->create();
        Wilayah::factory(15)->create();
        KondisiBts::create([
            'nama' => 'Baik',
            'created_by' => mt_rand(1, 5),
            'edited_by' => mt_rand(1, 5),
        ]);
        KondisiBts::create([
            'nama' => 'Sedang',
            'created_by' => mt_rand(1, 5),
            'edited_by' => mt_rand(1, 5),
        ]);
        KondisiBts::create([
            'nama' => 'Buruk',
            'created_by' => mt_rand(1, 5),
            'edited_by' => mt_rand(1, 5),
        ]);

        JenisBts::create([
            'nama' => 'Triangle',
            'created_by' => mt_rand(1, 5),
            'edited_by' => mt_rand(1, 5),
        ]);
        JenisBts::create([
            'nama' => 'Mono',
            'created_by' => mt_rand(1, 5),
            'edited_by' => mt_rand(1, 5),
        ]);
        JenisBts::create([
            'nama' => '4 Kaki',
            'created_by' => mt_rand(1, 5),
            'edited_by' => mt_rand(1, 5),
        ]);

        Bts::factory(10)->create();
        Monitoring::factory(12)->create();
        // FotoBts::factory(5)->create();

        
    }
}
