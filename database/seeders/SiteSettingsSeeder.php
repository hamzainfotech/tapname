<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'group' => 'general', 'type' => 'text', 'value' => 'Tap.Name', 'label' => 'Site Name', 'sort_order' => 1],
            ['key' => 'site_tagline', 'group' => 'general', 'type' => 'text', 'value' => 'Identity, Just a Tap Away', 'label' => 'Tagline', 'sort_order' => 2],
            ['key' => 'contact_email', 'group' => 'contact', 'type' => 'text', 'value' => 'connect@tap.name', 'label' => 'Contact Email', 'sort_order' => 3],
            ['key' => 'whatsapp', 'group' => 'contact', 'type' => 'text', 'value' => '+852 6956 5404', 'label' => 'WhatsApp', 'sort_order' => 4],
            ['key' => 'meta_title', 'group' => 'seo', 'type' => 'text', 'value' => 'TAP.NAME — Identity, Just a Tap Away', 'label' => 'Meta Title', 'sort_order' => 5],
            ['key' => 'meta_description', 'group' => 'seo', 'type' => 'textarea', 'value' => 'Next-gen NFC digital business cards and review redirect hardware in Hong Kong.', 'label' => 'Meta Description', 'sort_order' => 6],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}