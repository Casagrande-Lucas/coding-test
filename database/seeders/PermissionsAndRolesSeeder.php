<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsAndRolesSeeder extends Seeder
{
  /**
   * Run the database seeds. Create permissions, roles, users and assign existing permissions. 
   *
   * @return void
   */
  public function run(): void
  {
    // Reset cached roles and permissions.
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // Create permissions.
    Permission::create(['name' => 'create_product']);
    Permission::create(['name' => 'read_product']);
    Permission::create(['name' => 'show_product']);
    Permission::create(['name' => 'update_product']);
    Permission::create(['name' => 'delete_product']);
    Permission::create(['name' => 'cancel_product']);

    // Create roles and assign existing permissions.
    $roleAdmin = Role::create(['name' => 'super_admin']);

    // Create user.
    $userAdmin = User::factory()->create([
      'name' => 'Admin Mercearia',
      'email' => 'admin@mercearia.com.br',
      'password' => Hash::make('mercearia@123'),
    ]);
    $userAdmin->assignRole($roleAdmin);
  }
}
