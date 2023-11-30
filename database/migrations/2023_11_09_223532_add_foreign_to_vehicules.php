<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToVehicules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicules', function (Blueprint $table) {
            //
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            Schema::enableForeignKeyConstraints();


            $table->unsignedBigInteger('concessionnaire_id');
            $table->foreign('concessionnaire_id')
            ->references('id')
            ->on('concessionnaires')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            Schema::enableForeignKeyConstraints();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicules', function (Blueprint $table) {
            //
            Schema::disableForeignKeyConstraints();
            $table->dropForeign('vehicules_concessionnaire_id_foreign');
            $table->dropColumn('concessionnaire_id');
        });
    }
}
