<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id', 255)->unique();
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('username', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('password', 255)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('iam', 255)->nullable();
            $table->string('interestedin', 255)->nullable();
            $table->tinyInteger('financial_support')->comment('0: I am willing to give financial support, 1: I need financial support')->nullable();
            $table->date('dob')->nullable();
            $table->tinyInteger('age', false, true)->nullable();
            $table->float('height', 5)->nullable();
            $table->float('weight', 5)->nullable();
            $table->tinyInteger('body_type')->comment('0: , 1: , 2: , 3:  ')->nullable();
            $table->integer('child', false, true)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('zipcode', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('timezone', 255)->nullable();
            $table->tinyInteger('gender')->comment('0: Male, 1: Female, 2: Transgender')->nullable();
            $table->string('about_me', 255)->nullable();
            $table->string('latitude', 255)->nullable();
            $table->string('longitude', 255)->nullable();
            $table->string('profile_image', 255)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->tinyInteger('membership_type')->comment('0: , 1: , 2: , 3:  ')->nullable();
            $table->string('membership_price', 10)->nullable();
            $table->date('membership_start')->nullable();
            $table->date('membership_end')->nullable();
            $table->tinyInteger('membership_status')->comment('0: Inactive, 1: Active')->nullable();
            $table->tinyInteger('marital_status')->comment('0: Single, 1: Married')->nullable();
            $table->tinyInteger('privacy_status')->comment('0: Private, 1: Public')->nullable();
            $table->tinyInteger('verify_status')->comment('0: Not Verified, 1: Verified')->nullable();
            $table->tinyInteger('status')->comment('0: Inactive, 1: Active')->nullable();
            $table->tinyInteger('show_last_login')->comment('0: No, 1: Yes')->nullable();
            $table->tinyInteger('block_male_msg')->comment('0: No, 1: Yes')->nullable();
            $table->tinyInteger('block_female_msg')->comment('0: No, 1: Yes')->nullable();
            $table->tinyInteger('block_trans_msg')->comment('0: No, 1: Yes')->nullable();
            $table->tinyInteger('block_all_email')->comment('0: No, 1: Yes')->nullable();
            $table->tinyInteger('block_money_making_opp_email')->comment('0: No, 1: Yes')->nullable();
            $table->tinyInteger('block_local_event_meet_up_email')->comment('0: No, 1: Yes')->nullable();
            $table->tinyInteger('block_like_favorite_email')->comment('0: No, 1: Yes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
