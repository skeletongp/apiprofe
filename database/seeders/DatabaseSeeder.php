<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\University;
use App\Models\User;
use Database\Factories\PostImageFactory;
use Database\Factories\QuestionFactory;
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
        $universidades = file_get_contents(public_path('universities.json'));
        $universidades = json_decode($universidades);

        //order universidades by name alphabetically
        usort($universidades, function ($a, $b) {
            return strcmp($a->name, $b->name);
        });

        foreach ($universidades as $universidad) {
            University::create([
                'name' => $universidad->name . ' (' . $universidad->sigla . ')',
                'central' => substr($universidad->central, 0, strpos($universidad->central, ','))
            ]);
        }
        $user=User::factory()->create([
            'name' => 'Ismael Contreras',
            'email' => 'contrerasismael0@gmail.com',
            'username' => 'moso',
            'phone' => '8298041907',
            'password' => bcrypt('12345678'),
            'university_id' => 1,

        ]);
        $user->image()->create([
            'path' => avatar($user->name)
        ]);
        User::factory(10)->create()->each(function ($user) {
            $user->image()->create([
                'path' => avatar($user->name)
            ]);
        });

        $ids=[];
        for($i=10;$i<250;$i++){
            $ids[]=$i+1;
        }
        Post::factory(1000)->create();
        QuestionFactory::new()->count(1000)->create();

        PostImageFactory::new()->count(1000)->create()->each(function ($post) use (&$ids) {
            $id=array_rand($ids);
            $post->image()->create([
                'path' => "https://picsum.photos/id/{$id}/200/300"
            ]);
        });

    }
}
