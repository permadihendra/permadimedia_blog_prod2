<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BlogConfig;

class BlogConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BlogConfig::insert([
            [
                'name' => 'logo',
                'value' => 'logo.png',
            ],
            [
                'name' => 'app_name',
                'value' => 'permadimedia',
            ],
            [
                'name' => 'website',
                'value' => 'www.permadimedia.com',
            ],
            [
                'name' => 'header_text',
                'value' => 'Welcome to permadimedia.com',
            ],
            [
                'name' => 'header_caption',
                'value' => 'This is blog with laravel and livewire',
            ],
            [
                'name' => 'ads_widget',
                'value' => 'link',
            ],
            [
                'name' => 'ads_header',
                'value' => 'link',
            ],
            [
                'name' => 'ads_body',
                'value' => 'link',
            ],
            [
                'name' => 'phone',
                'value' => '+6281 88787 87878',
            ],
            [
                'name' => 'email',
                'value' => 'permadi@gmail.com',
            ],
            [
                'name' => 'facebook',
                'value' => 'link',
            ],
            [
                'name' => 'instagram',
                'value' => 'link',
            ],
            [
                'name' => 'twitter',
                'value' => 'link',
            ],


        ]);
    }
}
