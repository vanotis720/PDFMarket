<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    public function run(): void
    {
        $files = [
            [
                'title' => 'Introduction to Laravel',
                'description' => 'A comprehensive guide to getting started with the Laravel PHP framework. Learn about routing, controllers, models, and more.',
                'price' => 9.99,
                'file_path' => 'pdfs/laravel-intro.pdf',
            ],
            [
                'title' => 'Mobile Money Integration Guide',
                'description' => 'Step by step instructions on how to integrate mobile money payment gateways into your web applications.',
                'price' => 14.99,
                'file_path' => 'pdfs/mobile-money-guide.pdf',
            ],
            [
                'title' => 'Web Security Best Practices',
                'description' => 'Learn how to secure your web applications against common vulnerabilities and attacks.',
                'price' => 12.99,
                'file_path' => 'pdfs/security-guide.pdf',
            ],
        ];

        foreach ($files as $file) {
            File::create($file);
        }
    }
}
