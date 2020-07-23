<?php

use Illuminate\Database\Seeder;

class ScenarioTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CharacterDataTableSeeder::class);
        $this->call(CharacterImgTableSeeder::class);
        $this->call(GirlTermSubjectTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(TermTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        $this->call(TitleTableSeeder::class);
    }
}
