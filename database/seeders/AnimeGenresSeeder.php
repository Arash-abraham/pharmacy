<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\Category; 

class AnimeGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Kodomo', 'Shounen', 'Shoujo', 'Seinen', 'Josei',
            'Action', 'Adventure', 'Comedy', 'Drama', 'Fantasy', 'Sci-Fi',
            'Romance', 'Slice of Life', 'Supernatural', 'Horror', 'Mystery',
            'Psychological', 'Sports', 'Isekai', 'Mecha', 'Musical',
            'Post-Apocalyptic', 'Historical', 'Harem', 'Reverse Harem',
            'Ecchi', 'Mahou Shoujo',
        ];

        foreach ($genres as $genreName) {
            DB::table('categories')->insert([
                'name' => $genreName,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}