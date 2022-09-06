<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFields1InProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prospects', function (Blueprint $table) {
            $table->string('phone',20)->nullable(false);
            $table->string('contact_name',255)->nullable(false);
            $table->string('contact_phone',20)->nullable(false);
            $table->string('contact_email',255)->nullable(false);
            $table->text('requirement')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prospects', function (Blueprint $table) {
            //
        });
    }
}
