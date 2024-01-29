<?php

namespace Database\Seeders;

use App\Models\KategoriBuku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoribukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
            Schema::disableForeignKeyConstraints();
            KategoriBuku::truncate();
            Schema::enableForeignKeyConstraints();
    
            $data = [
                'novel','komik','romance','fiksi','horror','misteri',
                'biografi','sejarah','jurnal'
            ];  
    
            foreach($data as  $value){
                KategoriBuku::insert([
                    'name' => $value
                ]);
            }
    }
}
