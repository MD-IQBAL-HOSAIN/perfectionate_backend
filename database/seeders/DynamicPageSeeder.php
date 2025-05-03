<?php

namespace Database\Seeders;

use App\Models\DynamicPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DynamicPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'id' => 1,
                'page_title' => [
                    'en' => 'About Us',
                    'ar' => 'من نحن',
                ],
                'page_content' => [
                    'en' => 'This is the about us page.',
                    'ar' => 'هذه صفحة من نحن.',
                ],
                'status' => 'active',
            ],
            [
                'id' => 2,
                'page_title' => [
                    'en' => 'Terms & Conditions',
                    'ar' => 'الشروط والأحكام',
                ],
                'page_content' => [
                    'en' => 'This is the Terms & Conditions page.',
                    'ar' => 'هذه صفحة الشروط والأحكام.',
                ],
                'status' => 'active',
            ],
            [
                'id' => 3,
                'page_title' => [
                    'en' => 'Privacy Policy',
                    'ar' => 'سياسة الخصوصية',
                ],
                'page_content' => [
                    'en' => 'This is the privacy policy page.',
                    'ar' => 'هذه صفحة سياسة الخصوصية.',
                ],
                'status' => 'active',
            ],
        ];

        foreach ($pages as $pageData) {
            DynamicPage::updateOrCreate(
                ['id' => $pageData['id']],
                [
                    'page_title'   => $pageData['page_title'],
                    'page_content' => $pageData['page_content'],
                    'status'       => $pageData['status'],
                ]
            );
        }
    }
}
