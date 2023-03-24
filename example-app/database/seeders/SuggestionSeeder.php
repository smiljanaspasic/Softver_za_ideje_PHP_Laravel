<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suggestion;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suggestion::factory(4)->create();
    }
}
