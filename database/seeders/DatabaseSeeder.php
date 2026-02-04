<?php

namespace Database\Seeders;

use App\Models\EmailList;
use App\Models\Subscriber;
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
        $this->call([
            TemplateSeeder::class,
            EmailListSeeder::class,
            CampaignSeeder::class,
            UserSeeder::class,
            CampaignMailSeeder::class,
        ]);
    }
}
