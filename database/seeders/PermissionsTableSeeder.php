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
                'title' => 'link_create',
            ],
            [
                'id'    => 18,
                'title' => 'link_edit',
            ],
            [
                'id'    => 19,
                'title' => 'link_show',
            ],
            [
                'id'    => 20,
                'title' => 'link_delete',
            ],
            [
                'id'    => 21,
                'title' => 'link_access',
            ],
            [
                'id'    => 22,
                'title' => 'domain_create',
            ],
            [
                'id'    => 23,
                'title' => 'domain_edit',
            ],
            [
                'id'    => 24,
                'title' => 'domain_show',
            ],
            [
                'id'    => 25,
                'title' => 'domain_delete',
            ],
            [
                'id'    => 26,
                'title' => 'domain_access',
            ],
            [
                'id'    => 27,
                'title' => 'qr_code_create',
            ],
            [
                'id'    => 28,
                'title' => 'qr_code_edit',
            ],
            [
                'id'    => 29,
                'title' => 'qr_code_show',
            ],
            [
                'id'    => 30,
                'title' => 'qr_code_delete',
            ],
            [
                'id'    => 31,
                'title' => 'qr_code_access',
            ],
            [
                'id'    => 32,
                'title' => 'page_create',
            ],
            [
                'id'    => 33,
                'title' => 'page_edit',
            ],
            [
                'id'    => 34,
                'title' => 'page_show',
            ],
            [
                'id'    => 35,
                'title' => 'page_delete',
            ],
            [
                'id'    => 36,
                'title' => 'page_access',
            ],
            [
                'id'    => 37,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 38,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 39,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 40,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 41,
                'title' => 'click_create',
            ],
            [
                'id'    => 42,
                'title' => 'click_edit',
            ],
            [
                'id'    => 43,
                'title' => 'click_show',
            ],
            [
                'id'    => 44,
                'title' => 'click_delete',
            ],
            [
                'id'    => 45,
                'title' => 'click_access',
            ],
            [
                'id'    => 46,
                'title' => 'social_create',
            ],
            [
                'id'    => 47,
                'title' => 'social_edit',
            ],
            [
                'id'    => 48,
                'title' => 'social_show',
            ],
            [
                'id'    => 49,
                'title' => 'social_delete',
            ],
            [
                'id'    => 50,
                'title' => 'social_access',
            ],
            [
                'id'    => 51,
                'title' => 'template_create',
            ],
            [
                'id'    => 52,
                'title' => 'template_edit',
            ],
            [
                'id'    => 53,
                'title' => 'template_show',
            ],
            [
                'id'    => 54,
                'title' => 'template_delete',
            ],
            [
                'id'    => 55,
                'title' => 'template_access',
            ],
            [
                'id'    => 56,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
