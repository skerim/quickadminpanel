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
                'title' => 'crane_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'producer_create',
            ],
            [
                'id'    => 19,
                'title' => 'producer_edit',
            ],
            [
                'id'    => 20,
                'title' => 'producer_show',
            ],
            [
                'id'    => 21,
                'title' => 'producer_delete',
            ],
            [
                'id'    => 22,
                'title' => 'producer_access',
            ],
            [
                'id'    => 23,
                'title' => 'type_create',
            ],
            [
                'id'    => 24,
                'title' => 'type_edit',
            ],
            [
                'id'    => 25,
                'title' => 'type_show',
            ],
            [
                'id'    => 26,
                'title' => 'type_delete',
            ],
            [
                'id'    => 27,
                'title' => 'type_access',
            ],
            [
                'id'    => 28,
                'title' => 'crane_create',
            ],
            [
                'id'    => 29,
                'title' => 'crane_edit',
            ],
            [
                'id'    => 30,
                'title' => 'crane_show',
            ],
            [
                'id'    => 31,
                'title' => 'crane_delete',
            ],
            [
                'id'    => 32,
                'title' => 'crane_access',
            ],
            [
                'id'    => 33,
                'title' => 'contract_management_access',
            ],
            [
                'id'    => 34,
                'title' => 'customer_create',
            ],
            [
                'id'    => 35,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 36,
                'title' => 'customer_show',
            ],
            [
                'id'    => 37,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 38,
                'title' => 'customer_access',
            ],
            [
                'id'    => 39,
                'title' => 'project_create',
            ],
            [
                'id'    => 40,
                'title' => 'project_edit',
            ],
            [
                'id'    => 41,
                'title' => 'project_show',
            ],
            [
                'id'    => 42,
                'title' => 'project_delete',
            ],
            [
                'id'    => 43,
                'title' => 'project_access',
            ],
            [
                'id'    => 44,
                'title' => 'rental_create',
            ],
            [
                'id'    => 45,
                'title' => 'rental_edit',
            ],
            [
                'id'    => 46,
                'title' => 'rental_show',
            ],
            [
                'id'    => 47,
                'title' => 'rental_delete',
            ],
            [
                'id'    => 48,
                'title' => 'rental_access',
            ],
            [
                'id'    => 49,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 50,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 51,
                'title' => 'report_management_access',
            ],
            [
                'id'    => 52,
                'title' => 'report_create',
            ],
            [
                'id'    => 53,
                'title' => 'report_edit',
            ],
            [
                'id'    => 54,
                'title' => 'report_show',
            ],
            [
                'id'    => 55,
                'title' => 'report_delete',
            ],
            [
                'id'    => 56,
                'title' => 'report_access',
            ],
            [
                'id'    => 57,
                'title' => 'service_management_access',
            ],
            [
                'id'    => 58,
                'title' => 'maintenance_create',
            ],
            [
                'id'    => 59,
                'title' => 'maintenance_edit',
            ],
            [
                'id'    => 60,
                'title' => 'maintenance_show',
            ],
            [
                'id'    => 61,
                'title' => 'maintenance_delete',
            ],
            [
                'id'    => 62,
                'title' => 'maintenance_access',
            ],
            [
                'id'    => 63,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
