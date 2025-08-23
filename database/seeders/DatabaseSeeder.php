<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default membership plans
        \App\Models\MembershipPlan::create([
            'name' => 'Basic',
            'description' => 'Basic plan with essential features',
            'monthly_email_limit' => 10000,
            'max_domains' => 1,
            'price_monthly' => 29.99,
            'price_yearly' => 299.99,
        ]);

        \App\Models\MembershipPlan::create([
            'name' => 'Pro',
            'description' => 'Professional plan with advanced features',
            'monthly_email_limit' => 50000,
            'max_domains' => 3,
            'price_monthly' => 99.99,
            'price_yearly' => 999.99,
        ]);

        // Create admin user
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@jowmail.test',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
