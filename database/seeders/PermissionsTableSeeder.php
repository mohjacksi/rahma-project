<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'donation_category_create',
            ],
            [
                'id'    => 18,
                'title' => 'donation_category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'donation_category_show',
            ],
            [
                'id'    => 20,
                'title' => 'donation_category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'donation_category_access',
            ],
            [
                'id'    => 22,
                'title' => 'project_create',
            ],
            [
                'id'    => 23,
                'title' => 'project_edit',
            ],
            [
                'id'    => 24,
                'title' => 'project_show',
            ],
            [
                'id'    => 25,
                'title' => 'project_delete',
            ],
            [
                'id'    => 26,
                'title' => 'project_access',
            ],
            [
                'id'    => 27,
                'title' => 'bank_create',
            ],
            [
                'id'    => 28,
                'title' => 'bank_edit',
            ],
            [
                'id'    => 29,
                'title' => 'bank_show',
            ],
            [
                'id'    => 30,
                'title' => 'bank_delete',
            ],
            [
                'id'    => 31,
                'title' => 'bank_access',
            ],
            [
                'id'    => 32,
                'title' => 'payment_create',
            ],
            [
                'id'    => 33,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 34,
                'title' => 'payment_show',
            ],
            [
                'id'    => 35,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 36,
                'title' => 'payment_access',
            ],
            [
                'id'    => 37,
                'title' => 'contact_us_create',
            ],
            [
                'id'    => 38,
                'title' => 'contact_us_show',
            ],
            [
                'id'    => 39,
                'title' => 'contact_us_delete',
            ],
            [
                'id'    => 40,
                'title' => 'contact_us_access',
            ],
            [
                'id'    => 41,
                'title' => 'page_create',
            ],
            [
                'id'    => 42,
                'title' => 'page_edit',
            ],
            [
                'id'    => 43,
                'title' => 'page_show',
            ],
            [
                'id'    => 44,
                'title' => 'page_delete',
            ],
            [
                'id'    => 45,
                'title' => 'page_access',
            ],
            [
                'id'    => 46,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
