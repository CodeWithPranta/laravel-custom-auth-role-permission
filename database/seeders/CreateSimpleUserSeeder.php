<?php
namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class CreateSimpleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Pranta Mazumder',
            'phone' => '01317071128',
            'father_name' => 'Shibpada Mazumder',
            'mother_name' => 'Lila Mazumder',
            'is_baruikati'=> 'Yes',
            'password' => Hash::make('password'),
        ]);

        $role = Role::create(['name' => 'user' ]);
        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
