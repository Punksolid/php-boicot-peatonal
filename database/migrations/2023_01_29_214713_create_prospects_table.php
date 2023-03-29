<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('image_url')->nullable();

            $table->boolean('is_active')->default(true);
            $table->boolean('has_bumps')->default(false);
            $table->boolean('is_from_politician')->default(false);
            $table->boolean('is_from_media')->default(false);
            $table->boolean('is_from_business')->default(false);

            $table->string('Address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('geo_location');
            $table->string('google_maps_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('reporter_email');
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
        Schema::dropIfExists('prospects');
    }
};
