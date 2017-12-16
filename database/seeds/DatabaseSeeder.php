<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 3)->create();
        factory(App\Models\Category::class, 3)
            ->create()
            ->each(function ($u) {
                $u->courses()->saveMany(factory(App\Models\Course::class,3)->make())->each(function ($c){
                    $c->exams()->saveMany(factory(\App\Models\Exam::class,3)->make())->each(function ($e){
                        $e->questions()->saveMany(factory(\App\Models\Question::class,4)->make())->each(function ($q){
                           $q->answers()->saveMany(factory(\App\Models\Answer::class,4)->make())->each(function ($a){
                               $a->correctAnswer()->save(factory(\App\Models\Correct_answer::class)->make());
                           });
                        });
                    });
                });

            });

    }
}
