<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'admin', 'name' => 'Admin', 'email' => 'admin@binus.ac.id', 'phone' => null, 'password' => Hash::make('admin')],
            ['username' => 'farkhan', 'name' => 'Farkhan', 'email' => 'farkhan.ghozi@binus.ac.id', 'phone' => '+6287781166445', 'password' => Hash::make('admin')],
            ['username' => 'reevaldi', 'name' => 'Reevaldi', 'email' => 'reevaldi.susanto@binus.ac.id', 'phone' => '+6287770595265', 'password' => Hash::make('admin')],
            ['username' => 'bobby', 'name' => 'Bobby', 'email' => 'bobby.susilo@binus.ac.id', 'phone' => '+6285977151997', 'password' => Hash::make('admin')],
        ]);

        DB::table('questions')->insert([
            ['QuestionLevel' => 'Kindergarten', 'Question' => '2 + 3', 'Answer' => '5'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '4 - 1', 'Answer' => '3'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '1 + 4', 'Answer' => '5'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '3 - 2', 'Answer' => '1'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '5 - 3', 'Answer' => '2'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '2 + 2', 'Answer' => '4'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '4 - 2', 'Answer' => '2'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '3 + 1', 'Answer' => '4'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '5 - 2', 'Answer' => '3'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '1 + 3', 'Answer' => '4'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '3 - 1', 'Answer' => '2'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '2 + 1', 'Answer' => '3'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '5 - 4', 'Answer' => '1'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '4 + 1', 'Answer' => '5'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '2 - 1', 'Answer' => '1'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '3 + 2', 'Answer' => '5'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '1 + 2', 'Answer' => '3'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '4 - 3', 'Answer' => '1'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '2 + 4', 'Answer' => '6'],
            ['QuestionLevel' => 'Kindergarten', 'Question' => '5 - 1', 'Answer' => '4'],

            ['QuestionLevel' => '1&2Grade', 'Question' => '20 + 5 + 8', 'Answer' => '33'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '10 + 30 + 11', 'Answer' => '51'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '3 + 7 + 1', 'Answer' => '11'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '112 + 125', 'Answer' => '237'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '225 + 45', 'Answer' => '270'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '17 - 3 + 2', 'Answer' => '16'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '11 - 7', 'Answer' => '4'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '15 - 7 + 3', 'Answer' => '11'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '50 + 125 - 75', 'Answer' => '100'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '150 + 75 - 39', 'Answer' => '186'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '357 - 125 - 78', 'Answer' => '154'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '256 - 73 - 92', 'Answer' => '91'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '15 - 2', 'Answer' => '13'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '13 - 1', 'Answer' => '12'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '10 + 5', 'Answer' => '15'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '14 - 2', 'Answer' => '12'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '12 + 7', 'Answer' => '19'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '11 + 6', 'Answer' => '17'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '15 - 3', 'Answer' => '12'],
            ['QuestionLevel' => '1&2Grade', 'Question' => '14 + 2', 'Answer' => '16'],

            ['QuestionLevel' => '3&4Grade', 'Question' => '4 x 2', 'Answer' => '8'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '6 ÷ 3', 'Answer' => '2'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '15 x 3', 'Answer' => '45'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '20 ÷ 4', 'Answer' => '5'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '4 x 3', 'Answer' => '12'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '6 x (7 - 3)', 'Answer' => '24'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '12 x (16 ÷ 4)', 'Answer' => '48'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '265 - 93 x 2', 'Answer' => '69'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '1 ÷ 5', 'Answer' => '0.2'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '3 ÷ 16', 'Answer' => '0.187'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '21 x 8 ÷ 7', 'Answer' => '24'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '125 x 8 x 67', 'Answer' => '67000'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '30 x 40 - 750', 'Answer' => '450'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '53 x 78', 'Answer' => '4134'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '46 + 150 ÷ 15', 'Answer' => '56'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '35 + (-17)', 'Answer' => '18'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '-8 + (-15) - (-21)', 'Answer' => '-2'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '236 + (-116)', 'Answer' => '120'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '300 + 150 - 60', 'Answer' => '390'],
            ['QuestionLevel' => '3&4Grade', 'Question' => '(4 + 16) x 3', 'Answer' => '60'],

            ['QuestionLevel' => '5&6Grade', 'Question' => '197 x 25 x 4', 'Answer' => '19700'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '5 x (14 - 9)', 'Answer' => '25'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '40 ÷ (8 - 3)', 'Answer' => '8'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '(60 + 12) ÷ 8', 'Answer' => '9'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '9.84 - 5.94', 'Answer' => '3.9'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '7.85 - 1.95', 'Answer' => '5.9'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '40 x 12 ÷ (153 - 113)', 'Answer' => '12'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '2543 - 2104 + 2993', 'Answer' => '3432'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '1.3 x 2.4', 'Answer' => '3.12'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '√256', 'Answer' => '16'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '8^2', 'Answer' => '64'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '660 + 225 ÷ (-15)', 'Answer' => '645'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '36^2 - 17^2', 'Answer' => '1007'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '20^2 + 26^2', 'Answer' => '1076'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '21^2 - 13^2', 'Answer' => '272'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '√144', 'Answer' => '12'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '√1296', 'Answer' => '36'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '√1521', 'Answer' => '39'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '√1600', 'Answer' => '40'],
            ['QuestionLevel' => '5&6Grade', 'Question' => '√2500', 'Answer' => '50']
        ]);
    }
}
