<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcoSubmission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ico_submission', function (Blueprint $table) {
           $table->increments('id');
           $table->enum('ico_type', ['P', 'I']);
           $table->integer('user_id');
           $table->string('name');
           $table->string('symbol');
           $table->text('short_description');
           $table->string('concept');
           $table->string('start_time');
           $table->string('end_time');
           $table->string('soft_cap');
           $table->string('technology');
           $table->string('origin_country');
           $table->string('kyc_id');
           $table->string('banner_image')->nullable();
           $table->string('logo_image')->nullable();
           $table->string('kyc_doc')->nullable();
           $table->string('website');
           $table->string('blog');
           $table->string('whitepaper');
           $table->string('facebook');
           $table->string('twitter');
           $table->string('linkedin');
           $table->string('slack_chat');
           $table->string('telegram_chat');
           $table->string('github');
           $table->softDeletes();
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
        //
    }
}
