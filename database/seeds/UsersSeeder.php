<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role super_admin
        $superadminRole = new Role();
        $superadminRole->name = "superadmin";
        $superadminRole->display_name = "SuperAdmin";
        $superadminRole->save();

        // Membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();
        
        // Membuat role karyawan
        $karyawanRole = new Role();
        $karyawanRole->name = "karyawan";
        $karyawanRole->display_name = "Karyawan";
        $karyawanRole->save();

        // Membuat sample superadmin
        $superadmin = new User();
        $superadmin->name = 'superadmin';
        $superadmin->email = 'superadmin@gmail.com';
        $superadmin->password = bcrypt('inventory01');
        $superadmin->save();
        $superadmin->attachRole($superadminRole);

        // Membuat sample admin
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('inventory123');
        $admin->save();
        $admin->attachRole($adminRole);

        // Membuat sample karyawan
        $karyawan = new User();
        $karyawan->name = "Karyawan";
        $karyawan->email = 'karyawan@gmail.com';
        $karyawan->password = bcrypt('inventory789');
        $karyawan->save();
        $karyawan->attachRole($karyawanRole);
    }
}
