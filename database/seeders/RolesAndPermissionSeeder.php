<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create Permission permissions
        Permission::create(['name' => 'view permissions',    'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny permissions', 'guard_name' => 'web']);
        Permission::create(['name' => 'create permissions',  'guard_name' => 'web']);
        Permission::create(['name' => 'edit permissions',    'guard_name' => 'web']);
        Permission::create(['name' => 'delete permissions',  'guard_name' => 'web']);

        // create Role permissions
        Permission::create(['name' => 'view roles',     'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny roles',  'guard_name' => 'web']);
        Permission::create(['name' => 'create roles',   'guard_name' => 'web']);
        Permission::create(['name' => 'edit roles',     'guard_name' => 'web']);
        Permission::create(['name' => 'delete roles',   'guard_name' => 'web']);


        // create User permissions
        Permission::create(['name' => 'view users',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny users', 'guard_name' => 'web']);
        Permission::create(['name' => 'create users', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit users',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete users', 'guard_name' => 'web']);

        // create User User with default permissions
        $userrole = Role::create(['name' => 'User User']);
        $userrole->givePermissionTo(['view users', 'viewAny users', 'create users']);
        $this->command->info('Roles and Permissions granted to User User');

        // create User Manager role with default permissions
        $managerrole = Role::create(['name' => 'User Manager']);
        $managerrole->givePermissionTo(['view users', 'viewAny users', 'create users', 'edit users']);
        $this->command->info('Roles and Permissions granted to User Manager');

        // create User Admin with default permissions
        $adminrole = Role::create(['name' => 'User Admin']);
        $adminrole->givePermissionTo(['view users', 'viewAny users', 'create users', 'edit users', 'delete users']);
        $this->command->info('Roles and Permissions granted to User Admin');

        // create Vaccination Booked Log permissions
        Permission::create(['name' => 'view vaccination_booked_logs',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny vaccination_booked_logs', 'guard_name' => 'web']);
        Permission::create(['name' => 'create vaccination_booked_logs', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit vaccination_booked_logs',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete vaccination_booked_logs', 'guard_name' => 'web']);

        // create Vaccination Booked Log User with default permissions
        $userrole = Role::create(['name' => 'Vaccination Booked Log User']);
        $userrole->givePermissionTo(['view vaccination_booked_logs', 'viewAny vaccination_booked_logs', 'create vaccination_booked_logs']);
        $this->command->info('Roles and Permissions granted to Vaccination Booked Log User');

        // create Vaccination Booked Log Manager role with default permissions
        $managerrole = Role::create(['name' => 'Vaccination Booked Log Manager']);
        $managerrole->givePermissionTo(['view vaccination_booked_logs', 'viewAny vaccination_booked_logs', 'create vaccination_booked_logs', 'edit vaccination_booked_logs']);
        $this->command->info('Roles and Permissions granted to Vaccination Booked Log Manager');

        // create Vaccination Booked Log Admin with default permissions
        $adminrole = Role::create(['name' => 'Vaccination Booked Log Admin']);
        $adminrole->givePermissionTo(['view vaccination_booked_logs', 'viewAny vaccination_booked_logs', 'create vaccination_booked_logs', 'edit vaccination_booked_logs', 'delete vaccination_booked_logs']);
        $this->command->info('Roles and Permissions granted to Vaccination Booked Log Admin');

        // User Role
        $user_role = Role::create(['name' => 'User']);

        // Grant Super Admin rights to SUPER_ADMIN_EMAIL
        $adminEmail = env('SUPER_ADMIN_EMAIL', null);
        if (is_null($adminEmail)) {
            throw new \InvalidArgumentException('SUPER_ADMIN_EMAIL cannot be empty!');
        }

        $user = User::whereEmail($adminEmail)->first();

        if (is_null($user)) {
            throw new \InvalidArgumentException('User cannot be empty!');
        }

        $role = Role::create(['name' => 'Super Admin']);
        $user->assignRole('Super Admin');
        $this->command->info('Super Admin Role created successfully.');

    }
}
