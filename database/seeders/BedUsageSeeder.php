<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BedUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bed_usages')->insert([
            [
                'bed_id'        => 1,
                'start_time'    => '2023-08-25T15:45:00',
                'finish_time'   => '2023-08-25T17:45:00',
                'service_time'  => 2,
                'service_status'=> 1,
                'uploaded_by'   => 1,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]
        ]);
    }
}
