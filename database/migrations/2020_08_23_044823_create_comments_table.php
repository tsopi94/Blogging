<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('blog_post_id');
        $table->string('name')->nullable()->default('Anonymous');;
        $table->string('email')->nullable()->default('Anonymous');
        $table->ipAddress('visitor_ip');
        $table->text('comment');
        $table->foreignId('comment_id')->nullable();
        $table->integer('level');
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
        Schema::dropIfExists('comments');
    }
}
