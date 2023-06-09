<?php

namespace Database\Seeders;

use App\Models\Disposisi;
use Illuminate\Database\Seeder;

class DisposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disposisi::create([
            'id' => 1,
            'nama_disposisi' => 'Diterima',
        ]);

        Disposisi::create([
            'id' => 2,
            'nama_disposisi' => 'Belum Diterima',
        ]);

        Disposisi::create([
            'id' => 3,
            'nama_disposisi' => 'Ditolak',
        ]);
    }
}
