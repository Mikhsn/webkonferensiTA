<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'title' => '8th International Visual Informatics Conference (IVIC23)',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla excepturi rem tenetur a magnam! Id aliquam veritatis necessitatibus praesentium facere. Facilis, exercitationem! Cupiditate officiis pariatur ea ad reiciendis non laborum.',
            'image' => 'sotvi2.jpg',
        ]);

        News::create([
            'title' => 'The 1st 2023 Asia-Europe Conference on Applied Information Technology 2023 (AETECH)',
            'content' => 'The 1st 2023 Asia-Europe Conference on Applied Information Technology 2023 (AETECH) is an international symposium which covers Applied Information Technology . AETECH 2023 will be held on October 6, 2023 in United Kingdom. This conference organized by Society of Visual Informatics.',
            'image' => 'sotvi.jpeg',
        ]);

        News::create([
            'title' => 'The 1st 2023 Software & Technologies, Visual Informatics & Applications (SOTVIA) Conference',
            'content' => 'The 1st 2023 Software & Technologies, Visual Informatics & Applications (SOTVIA) Conference is an international symposium which covers Applied Information Technology and Innovation. SOTVIA 2023 will be held on Almaty, Kazakhstan in September 25, 2023. This conference organized by Society of Visual Informatics.',
            'image' => 'sotvi1.jpeg',
        ]);

        News::create([
            'title' => 'The 2nd 2024 Software & Technologies, Visual Informatics & Applications (SOTVIA) Conference',
            'content' => 'The 2nd 2024 Software & Technologies, Visual Informatics & Applications (SOTVIA) Conference is an international symposium which covers Applied Information Technology and Innovation. SOTVIA 2024 will be held on Almaty, Kazakhstan in September 25, 2024. This conference organized by Society of Visual Informatics.',
            'image' => 'sotvia.png',
        ]);

    }

}
