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
                'title' => 'service_management_access',
            ],
            [
                'id'    => 53,
                'title' => 'maintenance_create',
            ],
            [
                'id'    => 54,
                'title' => 'maintenance_edit',
            ],
            [
                'id'    => 55,
                'title' => 'maintenance_show',
            ],
            [
                'id'    => 56,
                'title' => 'maintenance_delete',
            ],
            [
                'id'    => 57,
                'title' => 'maintenance_access',
            ],
            [
                'id'    => 58,
                'title' => 'raport_create',
            ],
            [
                'id'    => 59,
                'title' => 'raport_edit',
            ],
            [
                'id'    => 60,
                'title' => 'raport_show',
            ],
            [
                'id'    => 61,
                'title' => 'raport_delete',
            ],
            [
                'id'    => 62,
                'title' => 'raport_access',
            ],
            [
                'id'    => 63,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 64,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 65,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 66,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 67,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 68,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 69,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 70,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 71,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 72,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 73,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 74,
                'title' => 'task_create',
            ],
            [
                'id'    => 75,
                'title' => 'task_edit',
            ],
            [
                'id'    => 76,
                'title' => 'task_show',
            ],
            [
                'id'    => 77,
                'title' => 'task_delete',
            ],
            [
                'id'    => 78,
                'title' => 'task_access',
            ],
            [
                'id'    => 79,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 80,
                'title' => 'harmonogram_create',
            ],
            [
                'id'    => 81,
                'title' => 'harmonogram_edit',
            ],
            [
                'id'    => 82,
                'title' => 'harmonogram_show',
            ],
            [
                'id'    => 83,
                'title' => 'harmonogram_delete',
            ],
            [
                'id'    => 84,
                'title' => 'harmonogram_access',
            ],
            [
                'id'    => 85,
                'title' => 'craneclass_create',
            ],
            [
                'id'    => 86,
                'title' => 'craneclass_edit',
            ],
            [
                'id'    => 87,
                'title' => 'craneclass_show',
            ],
            [
                'id'    => 88,
                'title' => 'craneclass_delete',
            ],
            [
                'id'    => 89,
                'title' => 'craneclass_access',
            ],
            [
                'id'    => 90,
                'title' => 'support_create',
            ],
            [
                'id'    => 91,
                'title' => 'support_edit',
            ],
            [
                'id'    => 92,
                'title' => 'support_show',
            ],
            [
                'id'    => 93,
                'title' => 'support_delete',
            ],
            [
                'id'    => 94,
                'title' => 'support_access',
            ],
            [
                'id'    => 95,
                'title' => 'klimatyzacja_create',
            ],
            [
                'id'    => 96,
                'title' => 'klimatyzacja_edit',
            ],
            [
                'id'    => 97,
                'title' => 'klimatyzacja_show',
            ],
            [
                'id'    => 98,
                'title' => 'klimatyzacja_delete',
            ],
            [
                'id'    => 99,
                'title' => 'klimatyzacja_access',
            ],
            [
                'id'    => 100,
                'title' => 'liny_create',
            ],
            [
                'id'    => 101,
                'title' => 'liny_edit',
            ],
            [
                'id'    => 102,
                'title' => 'liny_show',
            ],
            [
                'id'    => 103,
                'title' => 'liny_delete',
            ],
            [
                'id'    => 104,
                'title' => 'liny_access',
            ],
            [
                'id'    => 105,
                'title' => 'zawiesium_create',
            ],
            [
                'id'    => 106,
                'title' => 'zawiesium_edit',
            ],
            [
                'id'    => 107,
                'title' => 'zawiesium_show',
            ],
            [
                'id'    => 108,
                'title' => 'zawiesium_delete',
            ],
            [
                'id'    => 109,
                'title' => 'zawiesium_access',
            ],
            [
                'id'    => 110,
                'title' => 'transport_create',
            ],
            [
                'id'    => 111,
                'title' => 'transport_edit',
            ],
            [
                'id'    => 112,
                'title' => 'transport_show',
            ],
            [
                'id'    => 113,
                'title' => 'transport_delete',
            ],
            [
                'id'    => 114,
                'title' => 'transport_access',
            ],
            [
                'id'    => 115,
                'title' => 'saport_access',
            ],
            [
                'id'    => 116,
                'title' => 'servi_create',
            ],
            [
                'id'    => 117,
                'title' => 'servi_edit',
            ],
            [
                'id'    => 118,
                'title' => 'servi_show',
            ],
            [
                'id'    => 119,
                'title' => 'servi_delete',
            ],
            [
                'id'    => 120,
                'title' => 'servi_access',
            ],
            [
                'id'    => 121,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
