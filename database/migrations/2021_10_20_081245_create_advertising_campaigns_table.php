<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_campaigns', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('user_id');
            $table->string('name');
            $table->date('from_date');
            $table->date('to_date');
            $table->float('total_budget', 12, 2);
            $table->float('daily_budget', 12, 2);
            $table->string('banner_1');
            $table->string('banner_2')->nullable();
            $table->string('banner_3')->nullable();
            $table->string('banner_4')->nullable();
            $table->string('banner_5')->nullable();
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
        Schema::dropIfExists('advertising_campaigns');
    }
}
