<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProjectTableSeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['code' => '000H', 'created_at' => now(), 'updated_at' => now()],
            ['code' => '001H', 'created_at' => now(), 'updated_at' => now()],
            ['code' => '017C', 'created_at' => now(), 'updated_at' => now()],
            ['code' => '021C', 'created_at' => now(), 'updated_at' => now()],
            ['code' => '022C', 'created_at' => now(), 'updated_at' => now()],
            ['code' => '023C', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'APS', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('projects')->insert($projects);
    }
}
