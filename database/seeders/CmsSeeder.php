<?php

namespace Database\Seeders;

use App\Models\CMS;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                //Home content one
                'id' => 1,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //Home content two
                'id' => 2,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //Home content three
                'id' => 3,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //Home content four
                'id' => 4,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //Home content five
                'id' => 5,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //Home content six
                'id' => 6,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //Home content seven
                'id' => 7,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //Buy A Home page (finance)
                'id' => 8,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //
                'id' => 9,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
            [
                //
                'id' => 10,
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'button_text' => null,
                'button_title_one' => null,
                'button_subtitle_one' => null,
                'button_title_two' => null,
                'button_subtitle_two' => null,
                'button_title_three' => null,
                'button_subtitle_three' => null,
                'image_one' => null,
                'image_two' => null,
                'image_three' => null,
            ],
        ];

        foreach ($data as $item) {
            if (CMS::where('id', $item['id'])->exists()) {
                echo "ID {$item['id']} already exists. Skipping...\n"; // Newline Added
            } else {
                CMS::create($item);
                echo "ID {$item['id']} inserted successfully.\n"; // Newline Added
            }
        }
    }
}
