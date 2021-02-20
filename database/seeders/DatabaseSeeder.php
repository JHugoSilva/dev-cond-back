<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('units')->insert([
            'name'=>'APT 100',
            'id_owner'=>'1'
        ]);
        DB::table('units')->insert([
            'name'=>'APT 101',
            'id_owner'=>'1'
        ]);
        DB::table('units')->insert([
            'name'=>'APT 203',
            'id_owner'=>'0'
        ]);
        DB::table('units')->insert([
            'name'=>'APT 204',
            'id_owner'=>'0'
        ]);

        DB::table('areas')->insert([
            'allowed'=>'1',
            'title'=>'Academia',
            'cover'=>'gym.jpg',
            'days'=>'1,2,4,5',
            'start_time'=>'06:00:00',
            'end_time'=>'22:00:00'
        ]);
        DB::table('areas')->insert([
            'allowed'=>'1',
            'title'=>'Piscina',
            'cover'=>'pool.jpg',
            'days'=>'1,2,3,4,5',
            'start_time'=>'07:00:00',
            'end_time'=>'23:00:00'
        ]);
        DB::table('areas')->insert([
            'allowed'=>'1',
            'title'=>'Churrasqueira',
            'cover'=>'barbecue.jpg',
            'days'=>'4,5,6',
            'start_time'=>'09:00:00',
            'end_time'=>'23:00:00'
        ]);
        DB::table('wall')->insert([
            'title'=>'Título de Aviso Teste',
            'body'=>'Is simply dummy text of the printing and typesetting industry. 
            Lorem Ipsum has been the industry\'s standard dummy',
            'datecreated'=>'2021-11-03 15:00:00'
        ]);
        DB::table('wall')->insert([
            'title'=>'Título de Aviso Geral',
            'body'=>'Of type and scrambled it to make a type specimen book. It has survived not only five centuries.',
            'datecreated'=>'2021-11-05 13:00:00'
        ]);
    }
}
