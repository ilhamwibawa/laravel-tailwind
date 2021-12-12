<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Console\Command;

class SeedDefaultDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'starter:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed default data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Ask for db migration refresh, default is no
        if (Command::confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {
            // Call the php artisan migrate:refresh
            Command::call('migrate:refresh');
            Command::warn("Data cleared, starting from blank database.");
        }

        $permissions = Permission::defaultPermissions();

        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }

        Command::info('Default permissions added.');

        if (Command::confirm('Create Roles for user, default is admin and user? [y|N]', true)) {
            $inputRoles = Command::ask('Enter roles in comma separate format.', 'admin,user');
            $rolesArray = explode(',', $inputRoles);

            foreach ($rolesArray as $role) {
                $role = Role::firstOrCreate(['name' => trim($role)]);

                if ($role->name === 'admin') {
                    $role->syncPermissions(Permission::all());
                    Command::info('Admin granted all the permissions');
                } else {
                    $role->syncPermissions(Permission::where('name', 'LIKE', 'view_%')->get());
                }
                $this->createUser($role);
            }

            Command::info('Roles ' . $inputRoles . ' added successfully');
        } else {
            Role::firstOrCreate(['name' => 'user']);
            Command::info('Added only default user role');
        }
    }

    private function createUser($role)
    {
        $user = User::factory()->create();
        $user->assignRole($role->name);

        if ($role->name === 'admin') {
            Command::info('Here is your admin details to login');
            Command::warn($user->email);
            Command::warn('Password is "password"');
        }
    }
}
