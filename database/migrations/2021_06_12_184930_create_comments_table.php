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
            $table->text('comment');
            $table->boolean('is_approved')->default(false);
            $table->foreignId('post_id')->constrained()->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('user_id')->constrained()->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreignId('comment_id')->constrained()->onUpdate('CASCADE')->onDelete('CASCADE')->nullable();
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
