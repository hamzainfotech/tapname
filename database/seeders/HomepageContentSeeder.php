<?php

namespace Database\Seeders;

use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageContentSeeder extends Seeder
{
    public function run(): void
    {
        $meta = [
            ['key' => 'navbar', 'title' => 'Navigation Bar', 'subtitle' => null, 'sort' => 10],
            ['key' => 'hero', 'title' => 'Identity, Just a Tap Away', 'subtitle' => 'Upgrade your networking and F&B business reviews with custom NFC hardware in Hong Kong. Order sample packs and bulk orders today.', 'sort' => 20],
            ['key' => 'products', 'title' => 'Hardware Built For Impact', 'subtitle' => 'Engineered for durability, instant connection, and flawless performance.', 'sort' => 30],
            ['key' => 'solutions', 'title' => 'Tailored For Every Segment', 'subtitle' => 'Customized NFC deployments for every industry and use case.', 'sort' => 40],
            ['key' => 'advantages', 'title' => 'Why Professionals Switch to Tap.Name', 'subtitle' => 'See why businesses are upgrading from traditional paper cards.', 'sort' => 50],
            ['key' => 'how_it_works', 'title' => 'How It Works (3 Steps)', 'subtitle' => 'Get started in minutes with zero complicated setup required.', 'sort' => 60],
            ['key' => 'how_it_tap', 'title' => '3 Simple Steps to Tap', 'subtitle' => null, 'sort' => 70],
            ['key' => 'rfq_showcase', 'title' => 'Interactive Product Lineup', 'subtitle' => null, 'sort' => 80],
            ['key' => 'specs', 'title' => 'Technical Specifications', 'subtitle' => null, 'sort' => 90],
            ['key' => 'inquiry', 'title' => 'Request Samples or Bulk Quotes', 'subtitle' => null, 'sort' => 100],
            ['key' => 'footer', 'title' => 'Footer', 'subtitle' => null, 'sort' => 110],
        ];

        foreach ($meta as $info) {
            HomepageSection::updateOrCreate(
                ['key' => $info['key']],
                [
                    'type' => 'section',
                    'title' => $info['title'],
                    'subtitle' => $info['subtitle'],
                    'body' => null,
                    'sort_order' => $info['sort'],
                    'is_active' => true,
                ]
            );
        }
    }
}
