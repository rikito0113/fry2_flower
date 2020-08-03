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
        $this->call(CharacterDataTableSeeder::class);
        $this->call(CharacterImgTableSeeder::class);
        $this->call(GirlTermSubjectTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(TermTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        $this->call(ScenarioTableSeeder::class);
        $this->call(EventFixedPhraseTableSeeder::class);
    }
}
