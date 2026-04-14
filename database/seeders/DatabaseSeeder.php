<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@arkan.com',
            'is_admin' => true,
        ]);

        \App\Models\Service::create([
            'slug' => 'property-valuation',
            'title' => json_encode(['en' => 'Property Valuation', 'ar' => 'تقييم العقارات']),
            'description' => json_encode(['en' => 'Certified and compliant valuation reports.', 'ar' => 'تقارير تقييم معتمدة']),
            'icon' => 'home',
            'is_active' => true,
        ]);

        \App\Models\Service::create([
            'slug' => 'yield-management',
            'title' => json_encode(['en' => 'Yield Management', 'ar' => 'إدارة العوائد']),
            'description' => json_encode(['en' => 'Strategic optimization of real estate portfolios.', 'ar' => 'التحسين الاستراتيجي']),
            'icon' => 'trending-up',
            'is_active' => true,
        ]);
        
        \App\Models\NewsPost::create([
            'slug' => 'market-report-2025',
            'title' => json_encode(['en' => 'Saudi Real Estate Market Report 2025', 'ar' => 'تقرير السوق لعام 2025']),
            'content' => json_encode(['en' => 'The market is seeing unprecedented growth due to Vision 2030 initiatives.', 'ar' => 'يشهد السوق نمواً غير مسبوق']),
            'published_at' => now(),
        ]);
    }
}
