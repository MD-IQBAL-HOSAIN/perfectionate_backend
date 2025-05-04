<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'id' => 1,
                'question' => [
                    'en' => 'What is FAQ ?',
                    'ar' => 'ما هو سؤال متكرر',
                ],
                'answer' => [
                    'en' => 'FAQ is Frequently asked question.',
                    'ar' => 'هي صفحة للأسئلة الشائعة.',
                ],
                'status' => 'active',
            ],
        ];

        foreach ($pages as $pageData) {
            Faq::updateOrCreate(
                ['id' => $pageData['id']],
                [
                    'question'   => $pageData['question'],
                    'answer' => $pageData['answer'],
                    'status'       => $pageData['status'],
                ]
            );
        }
    }
}
