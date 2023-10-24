<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\PaymentType;
use App\Models\Specialization;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user=User::factory(10)->create();
        $doctor=Doctor::factory(10)->create();
        $medicine=Medicine::factory(10)->create();
        $paymentType=PaymentType::factory(1)->create();
        $specialization=Specialization::factory(5)->create();
    }
}
