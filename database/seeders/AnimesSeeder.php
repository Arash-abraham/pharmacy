<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AnimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Animes = [
            [
                'title' => 'Attack on Titan',
                'description' => 'Humanity lives within cities surrounded by enormous walls to protect themselves from gigantic humanoid creatures referred to as Titans. The story follows Eren Yeager, who vows to exterminate the Titans after they breach his hometown and cause the death of his mother.',
                'image' => 'images/attack-on-titan.jpg',
                'status' => 1,
                'cat_id' => 2 
            ],
            [
                'title' => 'Jujutsu Kaisen',
                'description' => 'A boy swallows a cursed talisman—the finger of a demon—and becomes cursed himself. He enters a shaman\'s school to be able to locate the demon\'s other body parts and thus exorcise himself.',
                'image' => 'images/jujutsu-kaisen.jpg',
                'status' => 1,
                'cat_id' => 2 

            ],
            [
                'title' => 'Demon Slayer',
                'description' => 'A kindhearted boy, Tanjiro Kamado, whose family is slaughtered by a demon, embarks on a perilous journey to turn his demon sister, Nezuko, back into a human and avenge the deaths of his family.',
                'image' => 'images/demon-slayer.jpg',
                'status' => 1,
                'cat_id' => 2 
                
            ],
            [
                'title' => 'Berserk',
                'description' => 'Guts, a lone mercenary, struggles for survival in a dark, brutal, and demon-infested world. He is haunted by his past and seeks vengeance against his former friend, Griffith, who betrayed him and sacrificed their comrades.',
                'image' => 'images/berserk.jpg', 
                'status' => 1, 
                'cat_id' => 4
            ]
        ];

        foreach ($Animes as $Anime) {
            $slug = Str::slug($Anime['title']);
            DB::table('posts')->insert([
                'title' => $Anime['title'],
                'description' => $Anime['description'],
                'image' => $Anime['image'],
                'slug' => $slug,
                'status' => $Anime['status'],
                'cat_id' => $Anime['cat_id'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
