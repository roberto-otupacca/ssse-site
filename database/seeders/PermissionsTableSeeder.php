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
                'title' => 'page_create',
            ],
            [
                'id'    => 23,
                'title' => 'page_edit',
            ],
            [
                'id'    => 24,
                'title' => 'page_show',
            ],
            [
                'id'    => 25,
                'title' => 'page_delete',
            ],
            [
                'id'    => 26,
                'title' => 'page_access',
            ],
            [
                'id'    => 27,
                'title' => 'news_create',
            ],
            [
                'id'    => 28,
                'title' => 'news_edit',
            ],
            [
                'id'    => 29,
                'title' => 'news_show',
            ],
            [
                'id'    => 30,
                'title' => 'news_delete',
            ],
            [
                'id'    => 31,
                'title' => 'news_access',
            ],
            [
                'id'    => 32,
                'title' => 'category_create',
            ],
            [
                'id'    => 33,
                'title' => 'category_edit',
            ],
            [
                'id'    => 34,
                'title' => 'category_show',
            ],
            [
                'id'    => 35,
                'title' => 'category_delete',
            ],
            [
                'id'    => 36,
                'title' => 'category_access',
            ],
            [
                'id'    => 37,
                'title' => 'file_create',
            ],
            [
                'id'    => 38,
                'title' => 'file_edit',
            ],
            [
                'id'    => 39,
                'title' => 'file_show',
            ],
            [
                'id'    => 40,
                'title' => 'file_delete',
            ],
            [
                'id'    => 41,
                'title' => 'file_access',
            ],
            [
                'id'    => 42,
                'title' => 'color_create',
            ],
            [
                'id'    => 43,
                'title' => 'color_edit',
            ],
            [
                'id'    => 44,
                'title' => 'color_show',
            ],
            [
                'id'    => 45,
                'title' => 'color_delete',
            ],
            [
                'id'    => 46,
                'title' => 'color_access',
            ],
            [
                'id'    => 47,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
