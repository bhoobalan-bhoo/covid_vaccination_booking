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

        // create Permission User with default permissions
        $userrole = Role::create(['name' => 'Permission User']);
        $userrole->givePermissionTo(['view permissions', 'viewAny permissions', 'create permissions']);
        $this->command->info('Roles and Permissions granted to Permission User');

        // create Permission Manager role with default permissions
        $managerrole = Role::create(['name' => 'Permission Manager']);
        $managerrole->givePermissionTo(['view permissions', 'viewAny permissions', 'create permissions', 'edit permissions']);
        $this->command->info('Roles and Permissions granted to Permission Manager');

        // create Permission Admin with default permissions
        $adminrole = Role::create(['name' => 'Permission Admin']);
        $adminrole->givePermissionTo(['view permissions', 'viewAny permissions', 'create permissions', 'edit permissions', 'delete permissions']);
        $this->command->info('Roles and Permissions granted to Permission Admin');

        // create Role permissions
        Permission::create(['name' => 'view roles',     'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny roles',  'guard_name' => 'web']);
        Permission::create(['name' => 'create roles',   'guard_name' => 'web']);
        Permission::create(['name' => 'edit roles',     'guard_name' => 'web']);
        Permission::create(['name' => 'delete roles',   'guard_name' => 'web']);

        // create Roles User with default permissions
        $userrole = Role::create(['name' => 'Roles User']);
        $userrole->givePermissionTo(['view roles', 'viewAny roles', 'create roles']);
        $this->command->info('Roles and Permissions granted to Roles User');

        // create Roles Manager role with default permissions
        $managerrole = Role::create(['name' => 'Roles Manager']);
        $managerrole->givePermissionTo(['view roles', 'viewAny roles', 'create roles', 'edit roles']);
        $this->command->info('Roles and Permissions granted to Roles Manager');

        // create Roles Admin with default permissions
        $adminrole = Role::create(['name' => 'Roles Admin']);
        $adminrole->givePermissionTo(['view roles', 'viewAny roles', 'create roles', 'edit roles', 'delete roles']);
        $this->command->info('Roles and Permissions granted to Roles Admin');

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

       // create Vaccination Centre permissions
        Permission::create(['name' => 'view vaccination_centres',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny vaccination_centres', 'guard_name' => 'web']);
        Permission::create(['name' => 'create vaccination_centres', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit vaccination_centres',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete vaccination_centres', 'guard_name' => 'web']);

        // create Vaccination Centre User with default permissions
        $userrole = Role::create(['name' => 'Vaccination Centre User']);
        $userrole->givePermissionTo(['view vaccination_centres', 'viewAny vaccination_centres', 'create vaccination_centres']);
        $this->command->info('Roles and Permissions granted to Vaccination Centre User');

        // create Vaccination Centre Manager role with default permissions
        $managerrole = Role::create(['name' => 'Vaccination Centre Manager']);
        $managerrole->givePermissionTo(['view vaccination_centres', 'viewAny vaccination_centres', 'create vaccination_centres', 'edit vaccination_centres']);
        $this->command->info('Roles and Permissions granted to Vaccination Centre Manager');

        // create Vaccination Centre Admin with default permissions
        $adminrole = Role::create(['name' => 'Vaccination Centre Admin']);
        $adminrole->givePermissionTo(['view vaccination_centres', 'viewAny vaccination_centres', 'create vaccination_centres', 'edit vaccination_centres', 'delete vaccination_centres']);
        $this->command->info('Roles and Permissions granted to Vaccination Centre Admin');
        
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

        // create Available Timings permissions
        Permission::create(['name' => 'view available_timings',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny available_timings', 'guard_name' => 'web']);
        Permission::create(['name' => 'create available_timings', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit available_timings',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete available_timings', 'guard_name' => 'web']);

        // create Available Timings User with default permissions
        $userrole = Role::create(['name' => 'Available Timings User']);
        $userrole->givePermissionTo(['view available_timings', 'viewAny available_timings', 'create available_timings']);
        $this->command->info('Roles and Permissions granted to Available Timings User');

        // create Available Timings Manager role with default permissions
        $managerrole = Role::create(['name' => 'Available Timings Manager']);
        $managerrole->givePermissionTo(['view available_timings', 'viewAny available_timings', 'create available_timings', 'edit available_timings']);
        $this->command->info('Roles and Permissions granted to Available Timings Manager');

        // create Available Timings Admin with default permissions
        $adminrole = Role::create(['name' => 'Available Timings Admin']);
        $adminrole->givePermissionTo(['view available_timings', 'viewAny available_timings', 'create available_timings', 'edit available_timings', 'delete available_timings']);
        $this->command->info('Roles and Permissions granted to Available Timings Admin');
        // create Slots permissions
        Permission::create(['name' => 'view slots',   'guard_name' => 'web']);
        Permission::create(['name' => 'viewAny slots', 'guard_name' => 'web']);
        Permission::create(['name' => 'create slots', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit slots',   'guard_name' => 'web']);
        Permission::create(['name' => 'delete slots', 'guard_name' => 'web']);

        // create Slots User with default permissions
        $userrole = Role::create(['name' => 'Slots User']);
        $userrole->givePermissionTo(['view slots', 'viewAny slots', 'create slots']);
        $this->command->info('Roles and Permissions granted to Slots User');

        // create Slots Manager role with default permissions
        $managerrole = Role::create(['name' => 'Slots Manager']);
        $managerrole->givePermissionTo(['view slots', 'viewAny slots', 'create slots', 'edit slots']);
        $this->command->info('Roles and Permissions granted to Slots Manager');

        // create Slots Admin with default permissions
        $adminrole = Role::create(['name' => 'Slots Admin']);
        $adminrole->givePermissionTo(['view slots', 'viewAny slots', 'create slots', 'edit slots', 'delete slots']);
        $this->command->info('Roles and Permissions granted to Slots Admin');

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
