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
                'title' => 'marketplace_access',
            ],
            [
                'id'    => 18,
                'title' => 'setting_create',
            ],
            [
                'id'    => 19,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 20,
                'title' => 'setting_show',
            ],
            [
                'id'    => 21,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 22,
                'title' => 'setting_access',
            ],
            [
                'id'    => 23,
                'title' => 'review_create',
            ],
            [
                'id'    => 24,
                'title' => 'review_edit',
            ],
            [
                'id'    => 25,
                'title' => 'review_show',
            ],
            [
                'id'    => 26,
                'title' => 'review_delete',
            ],
            [
                'id'    => 27,
                'title' => 'review_access',
            ],
            [
                'id'    => 28,
                'title' => 'infrastructure_create',
            ],
            [
                'id'    => 29,
                'title' => 'infrastructure_edit',
            ],
            [
                'id'    => 30,
                'title' => 'infrastructure_show',
            ],
            [
                'id'    => 31,
                'title' => 'infrastructure_delete',
            ],
            [
                'id'    => 32,
                'title' => 'infrastructure_access',
            ],
            [
                'id'    => 33,
                'title' => 'metro_create',
            ],
            [
                'id'    => 34,
                'title' => 'metro_edit',
            ],
            [
                'id'    => 35,
                'title' => 'metro_show',
            ],
            [
                'id'    => 36,
                'title' => 'metro_delete',
            ],
            [
                'id'    => 37,
                'title' => 'metro_access',
            ],
            [
                'id'    => 38,
                'title' => 'complex_create',
            ],
            [
                'id'    => 39,
                'title' => 'complex_edit',
            ],
            [
                'id'    => 40,
                'title' => 'complex_show',
            ],
            [
                'id'    => 41,
                'title' => 'complex_delete',
            ],
            [
                'id'    => 42,
                'title' => 'complex_access',
            ],
            [
                'id'    => 43,
                'title' => 'type_create',
            ],
            [
                'id'    => 44,
                'title' => 'type_edit',
            ],
            [
                'id'    => 45,
                'title' => 'type_show',
            ],
            [
                'id'    => 46,
                'title' => 'type_delete',
            ],
            [
                'id'    => 47,
                'title' => 'type_access',
            ],
            [
                'id'    => 48,
                'title' => 'finishing_create',
            ],
            [
                'id'    => 49,
                'title' => 'finishing_edit',
            ],
            [
                'id'    => 50,
                'title' => 'finishing_show',
            ],
            [
                'id'    => 51,
                'title' => 'finishing_delete',
            ],
            [
                'id'    => 52,
                'title' => 'finishing_access',
            ],
            [
                'id'    => 53,
                'title' => 'status_create',
            ],
            [
                'id'    => 54,
                'title' => 'status_edit',
            ],
            [
                'id'    => 55,
                'title' => 'status_show',
            ],
            [
                'id'    => 56,
                'title' => 'status_delete',
            ],
            [
                'id'    => 57,
                'title' => 'status_access',
            ],
            [
                'id'    => 58,
                'title' => 'apartment_create',
            ],
            [
                'id'    => 59,
                'title' => 'apartment_edit',
            ],
            [
                'id'    => 60,
                'title' => 'apartment_show',
            ],
            [
                'id'    => 61,
                'title' => 'apartment_delete',
            ],
            [
                'id'    => 62,
                'title' => 'apartment_access',
            ],
            [
                'id'    => 63,
                'title' => 'order_create',
            ],
            [
                'id'    => 64,
                'title' => 'order_edit',
            ],
            [
                'id'    => 65,
                'title' => 'order_show',
            ],
            [
                'id'    => 66,
                'title' => 'order_delete',
            ],
            [
                'id'    => 67,
                'title' => 'order_access',
            ],
            [
                'id'    => 68,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
