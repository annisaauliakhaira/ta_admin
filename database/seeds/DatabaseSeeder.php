<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        // $this->call(userseeder::class);
        // $this->call(buildingseeder::class);
        // $this->call(periodseeder::class);
        // $this->call(courseseeder::class);
        // $this->call(roomseeder::class);
        // $this->call(classesseeder::class);
        // $this->call(lecturerclassesseeder::class);
        // $this->call(examtypeseeder::class);
        // $this->call(examscheduleseeder::class);
        // $this->call(krsseeder::class);
        // $this->call(presenceseeder::class);
        // $this->call(newseventseeder::class);

        
        // $this->call(siaStaff::class);

        // $this->call(siaMahasiswa::class);
        // $this->call(siaDosen::class);
        // $this->call(siaPeriod::class);
        // $this->call(siaGedung::class);
        // $this->call(siaRuangan::class);
        // $this->call(siaCourses::class);
        // $this->call(siaClass::class);      
        // $this->call(siaLecturerClass::class);   
        // $this->call(siaKrs::class);  
        // $this->call(examtypeseeder::class);     
        $this->call(siaJadwalUjian::class);     
        $this->call(siaPresence::class);     
        
    }
}
