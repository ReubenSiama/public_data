<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPublicData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('public_data', function (Blueprint $table) {
            $table->string('address_link')->nullable();
            $table->string('data_id')->nullable();
            $table->integer('edited_by')->nullable();
            $table->enum('verification_status',['Unverified','Verified'])->default('Unverified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('public_data', function (Blueprint $table) {
            $table->dropColumn(['address_link','data_id','edited_by','verification_status']);
        });
    }
}
