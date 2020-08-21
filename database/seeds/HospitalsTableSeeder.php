<?php

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('hospitals')->insert([
            'name' => 'Bogura Clinic',
            'slogan' => 'Service Available in any time',
            'logo' => 'uploads/logo.png',
            'address' => 'Bogura, Rajshahi ',
            'contact' => '01409400635',
            'email' => 'shobujsa93@gmail.com',
            'pan_no' => '123',
            'registration_no' => '12345',
            'website' => 'shobuj.info',
            'description' => 'Service Available in any time.',
            'tax_type' => 'Health Tax',
            'tax_percent' => 10,
            'invoice_prefix'=>'Shobuj-',
            'patient_prefix' => 'P-',
            'invoice_message'=> 'Invoice',
        ]);

    }
}
