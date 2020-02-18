<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'lesson_create',
            ],
            [
                'id'    => '18',
                'title' => 'lesson_edit',
            ],
            [
                'id'    => '19',
                'title' => 'lesson_show',
            ],
            [
                'id'    => '20',
                'title' => 'lesson_delete',
            ],
            [
                'id'    => '21',
                'title' => 'lesson_access',
            ],
            [
                'id'    => '22',
                'title' => 'school_class_create',
            ],
            [
                'id'    => '23',
                'title' => 'school_class_edit',
            ],
            [
                'id'    => '24',
                'title' => 'school_class_show',
            ],
            [
                'id'    => '25',
                'title' => 'school_class_delete',
            ],
            [
                'id'    => '26',
                'title' => 'school_class_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
