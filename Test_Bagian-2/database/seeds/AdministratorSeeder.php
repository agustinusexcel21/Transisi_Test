<?php
use Illuminate\Database\Seeder;
class AdministratorSeeder extends Seeder
{
 /**
 * Run the database seeds.
 *
 * @return void
 */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->id_role = "1";
        $administrator->id_cabang = "1";
        $administrator->nama_pegawai = "admin";
        $administrator->email = "administrator@siato.com";
        $administrator->password = \Hash::make("admin");
        $administrator->alamat_pegawai = "Babarsari, No.69";
        $administrator->kontak_pegawai = "0892131231";
        $administrator->gaji_per_minggu = "200000";
        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
