<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\Role;         
        $administrator->nama_role = "mekanik";
 
        $administrator->save(); 
 
        $this->command->info("Role berhasil diinsert");
    }
}
