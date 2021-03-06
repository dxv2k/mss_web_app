<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            //
            // $table->integer('user_id')->unsigned()->index(); 
            // $table->integer('user_id')->index(); 
            // $table->integer('user_id')->unsigned(); 
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')
                ->references('id') 
                ->on('users')
                ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->dropForeign('user_id'); 
            $table->dropIndex('user_id'); 
            $table->dropColumn('user_id'); 
        });
    }
}
