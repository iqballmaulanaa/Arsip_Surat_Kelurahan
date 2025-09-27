<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Pengumuman',
                'description' => 'Surat-surat yang terkait dengan pengumuman'
            ],
            [
                'name' => 'Undangan',
                'description' => 'Undangan rapat, koordinasi, dsb.'
            ],
            [
                'name' => 'Nota Dinas',
                'description' => 'Nota dinas internal'
            ],
            [
                'name' => 'Pemberitahuan',
                'description' => 'Surat pemberitahuan'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}