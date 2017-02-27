<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder
{
    protected $roles = [
        'User'                  => 0,
        'Editor'                => 1,
        'Moderator'             => 2,
        'Administrator'         => 3,
        'Super Administrator'   => 4,

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $roleName => $roleId) {
            Role::create([
                'name' => $roleName,
                'role_id' => $roleId,
            ]);
        }
    }
}
