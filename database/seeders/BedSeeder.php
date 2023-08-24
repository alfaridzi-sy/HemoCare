<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beds')->insert([
            [
                'status'        => 0,
                'bed_number'    => '01',
                'uploaded_by'   => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'status'        => 0,
                'bed_number'    => '02',
                'uploaded_by'   => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'status'        => 0,
                'bed_number'    => '03',
                'uploaded_by'   => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'status'        => 0,
                'bed_number'    => '04',
                'uploaded_by'   => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ],
            [
                'status'        => 0,
                'bed_number'    => '05',
                'uploaded_by'   => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]
        ]);
    }
}
