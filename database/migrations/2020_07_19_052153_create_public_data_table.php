<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_data', function (Blueprint $table) {
            $table->id();
            $table->integer('added_by');
            $table->string('business_type_id');
            $table->string('company_firm_name');
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_number')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_contact_number')->nullable();
            $table->string('tel_number')->nullable();
            $table->string('website')->nullable();
            $table->string('source');
            $table->string('gst_number')->nullable();
            $table->text('remark')->nullable();
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('district');
            $table->string('pin_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_data');
    }
}
