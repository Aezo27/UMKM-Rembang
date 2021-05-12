<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('text_1')->nullable();
            $table->string('text_2')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('maps')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('emailphp')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('updated_by')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_contacts');
    }
}
