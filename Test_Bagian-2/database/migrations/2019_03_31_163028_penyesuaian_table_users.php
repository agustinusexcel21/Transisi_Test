<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class PenyesuaianTableUsers extends Migration
{
 /**
 * Run the migrations.
 *
 * @return void
 */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer("id_role")->index()->after('id');
            $table->integer("id_cabang")->index()->after('id_role');
            $table->string("nama_pegawai")->after('id_cabang');
            $table->text("alamat_pegawai")->after('password');
            $table->string("kontak_pegawai")->after('alamat_pegawai');
            $table->float("gaji_per_minggu")->after('kontak_pegawai');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
/**
* Reverse the migrations.
*
* @return void
*/
public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("id_role");
            $table->dropColumn("id_cabang");
            $table->dropColumn("nama_pegawai");
            $table->dropColumn("alamat_pegawai");
            $table->dropColumn("kontak_pegawai");
            $table->dropColumn("gaji_per_minggu");
        });
    }
}