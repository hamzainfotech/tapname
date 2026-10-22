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
            ['key' => 'hero', 'title' => 'Identity, Just a Tap Away.', 'subtitle' => 'Replace outdated paper cards and friction-filled forms. Tap.Name delivers high-impact NFC business cards, social stickers, and instant Google Review redirect hardware. Zero app download required.', 'button_text' => 'Order Sample Pack', 'button_url' => '#inquiry', 'sort' => 20],
            ['key' => 'products', 'title' => 'Hardware Built For Impact', 'subtitle' => 'Custom-engineered NFC form factors tailored for executive networking, fast social sharing, and high-footfall F&B table engagement.', 'sort' => 30],
            ['key' => 'solutions', 'title' => 'Tailored For Every Segment', 'subtitle' => 'Discover how Tap.Name replaces friction points across Hong Kong\'s most competitive industries.', 'sort' => 40],
            ['key' => 'advantages', 'title' => 'Why Professionals Switch to Tap.Name', 'subtitle' => 'Traditional paper business cards end up in the trash bin. Tap.Name guarantees your identity stays stored in your prospect\'s smartphone forever.', 'sort' => 50],
            ['key' => 'how_it_works', 'title' => 'How It Works (3 Steps)', 'subtitle' => 'Get started in minutes with zero complicated setup required.', 'sort' => 60],
            ['key' => 'how_it_tap', 'title' => '3 Simple Steps to Tap', 'subtitle' => null, 'sort' => 70],
            ['key' => 'rfq_showcase', 'title' => 'Interactive Product Lineup', 'subtitle' => 'Explore our standard NFC form factors, anti-metal shielding technology, epoxy keychains, and custom QR review stands.', 'sort' => 80],
            ['key' => 'specs', 'title' => 'Technical Specifications', 'subtitle' => 'We source high-grade NTAG chips and tuned antennas to guarantee maximum RF sensitivity and zero read failures.', 'sort' => 90],
            ['key' => 'inquiry', 'title' => 'Request Samples or Bulk Quotes', 'subtitle' => 'Based in Hong Kong. We supply sample packs (5–10 pcs) and bulk orders (50, 100, 500+ pcs) across HK & worldwide.', 'sort' => 100],
            ['key' => 'footer', 'title' => 'Footer', 'subtitle' => null, 'sort' => 110],
        ];

        foreach ($meta as $info) {
            HomepageSection::updateOrCreate(
                ['key' => $info['key']],
                [
                    'type' => 'section',
                    'title' => $info['title'],
                    'subtitle' => $info['subtitle'] ?? null,
                    'body' => $info['body'] ?? null,
                    'image_path' => $info['image_path'] ?? null,
                    'button_text' => $info['button_text'] ?? null,
                    'button_url' => $info['button_url'] ?? null,
                    'sort_order' => $info['sort'],
                    'is_active' => true,
                ]
            );
        }
    }
}
