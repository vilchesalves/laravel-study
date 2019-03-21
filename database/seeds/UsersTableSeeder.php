<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\User::where('email', 'admin@example.com')->first();
        if ($admin) {
            $admin->delete();
        }
        factory(App\User::class, 1)->states('admin')->create();
    }
}
