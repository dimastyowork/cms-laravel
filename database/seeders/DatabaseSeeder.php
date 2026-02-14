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
        $this->call([
            RolePermissionSeeder::class,
            PostCategorySeeder::class,
        ]);

        $user = User::firstOrCreate(
            ['email' => 'it.rsasabunda@gmail.com'],
            [
                'name' => 'IT RS Asa Bunda',
                'password' => 'karanganyar2026',
            ]
        );

        $adminRole = \App\Models\Role::where('slug', 'admin')->first();
        if ($adminRole) {
            $user->roles()->syncWithoutDetaching([$adminRole->id]);
        }
    }
}
