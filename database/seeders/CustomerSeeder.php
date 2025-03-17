<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Customer::create([
            'nama_customer' => 'PT. ABC',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
            'telp' => '021-12345678',
            'fax' => '021-87654321',
            'email' => 'abc@example.com',
        ]);

        Customer::create([
            'nama_customer' => 'CV. XYZ',
            'alamat' => 'Jl. Sudirman No. 25, Bandung',
            'telp' => '022-98765432',
            'fax' => '022-23456789',
            'email' => 'xyz@example.com',
        ]);
    }
}
