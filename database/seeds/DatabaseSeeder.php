<?php

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
        $this->call(userseeder::class);
        $this->call(buildingseeder::class);
        $this->call(periodseeder::class);
        $this->call(courseseeder::class);
        $this->call(roomseeder::class);
        $this->call(classesseeder::class);
        $this->call(lecturerclassesseeder::class);
        $this->call(examtypeseeder::class);
        $this->call(examscheduleseeder::class);
        $this->call(krsseeder::class);
        $this->call(presenceseeder::class);
        $this->call(newseventseeder::class);
    }
}
