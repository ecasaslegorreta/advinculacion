<?php
use app\Correspondence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        $this->call(SendersSeender::class);
        //$this->call(CorrespondenceSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(PositionSeeder::class);
    }
}
