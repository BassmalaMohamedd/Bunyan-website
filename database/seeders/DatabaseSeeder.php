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
            'email' => 'admin@bunyan.sa',
            'password' => bcrypt('admin123'),
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
            'slug' => 'vision-2030-housing-targets',
            'title' => json_encode(['en' => 'Vision 2030: Achieving New Housing Targets', 'ar' => 'رؤية 2030: تحقيق أهداف الإسكان الجديدة']),
            'content' => json_encode(['en' => 'The Ministry of Housing continues to expand residential opportunities, leveraging digital infrastructure to meet the increasing demand for high-quality neighborhoods.', 'ar' => 'تواصل وزارة الإسكان توسيع الفرص السكنية']),
            'image' => '/images/news1.jpg',
            'published_at' => now()->subDays(2),
        ]);

        \App\Models\NewsPost::create([
            'slug' => 'digital-integrity-valuation',
            'title' => json_encode(['en' => 'Digital Integrity: The Future of Valuation', 'ar' => 'النزاهة الرقمية: مستقبل التقييم']),
            'content' => json_encode(['en' => 'How immutable data and transparent algorithms are transforming the accuracy of property appraisals in the Kingdom\'s elite market segments.', 'ar' => 'كيف تعمل البيانات غير القابلة للتغيير على تحسين دقة التقييمات']),
            'image' => '/images/news_digital.png',
            'published_at' => now()->subDays(5),
        ]);

        \App\Models\NewsPost::create([
            'slug' => 'riyadh-grade-a-office-market',
            'title' => json_encode(['en' => 'The Expansion of Riyadh\'s Grade A Office Market', 'ar' => 'توسع سوق المكاتب من الفئة (A) في الرياض']),
            'content' => json_encode(['en' => 'Riyadh is witnessing a massive surge in demand for premium office spaces as international corporations establish their regional headquarters in the capital.', 'ar' => 'تشهد الرياض طفرة في الطلب على المكاتب الفاخرة']),
            'image' => '/images/news_office.png',
            'published_at' => now()->subDays(8),
        ]);

        \App\Models\NewsPost::create([
            'slug' => 'sustainable-urbanism-riyadh',
            'title' => json_encode(['en' => 'Sustainable Urbanism: Riyadh\'s Green Initiative', 'ar' => 'التوسع الحضري المستدام: مبادرة الرياض الخضراء']),
            'content' => json_encode(['en' => 'Modern communities are increasingly prioritizing green spaces and walkability, creating a new standard for urban living in Saudi Arabia.', 'ar' => 'تركز المجتمعات الحديثة بشكل متزايد على المساحات الخضراء']),
            'image' => '/images/B1.jpg',
            'published_at' => now()->subDays(12),
        ]);

        \App\Models\NewsPost::create([
            'slug' => 'corporate-governance-real-estate',
            'title' => json_encode(['en' => 'Corporate Governance in Saudi Real Estate', 'ar' => 'حوكمة الشركات في العقارات السعودية']),
            'content' => json_encode(['en' => 'Standardizing digital workflows to ensure transparency and accountability in large-scale property management operations.', 'ar' => 'توحيد سير العمل الرقمي لضمان الشفافية']),
            'image' => '/images/B2.jpg',
            'published_at' => now()->subDays(15),
        ]);

        \App\Models\NewsPost::create([
            'slug' => 'strategic-investment-patterns-2025',
            'title' => json_encode(['en' => 'Strategic Investment Patterns for 2025', 'ar' => 'أنماط الاستثمار الاستراتيجي لعام 2025']),
            'content' => json_encode(['en' => 'Analyzing the shift towards specialized asset classes and secondary market opportunities as the sector matures into 2025.', 'ar' => 'تحليل التحول نحو الفئات المتخصصة من الأصول']),
            'image' => '/images/B3.jpg',
            'published_at' => now()->subDays(20),
        ]);

        // Home Page Settings
        \App\Models\Setting::create(['key' => 'home_hero_title', 'value' => 'Mastering Integrity in Real Estate.', 'type' => 'string']);
        \App\Models\Setting::create(['key' => 'home_hero_subtitle', 'value' => 'Unlocking the foundation of sustainable economic success through our specialized software ecosystem and visionary consultancy.', 'type' => 'text']);
        \App\Models\Setting::create(['key' => 'home_stats_years', 'value' => '15+', 'type' => 'string']);
        \App\Models\Setting::create(['key' => 'home_stats_assets', 'value' => 'SAR 2.5B+', 'type' => 'string']);
        \App\Models\Setting::create(['key' => 'home_stats_projects', 'value' => '850+', 'type' => 'string']);
    }
}
