<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('comment');
            $table->string('email');
            $table->boolean('approuved');
            $table->integer('post_id')->unsigned();
            $table->timestamps();

        });
        
        Schema::table('comments',function (Blueprint $table){
            $table->foreign('post_id')->references('id')->on('posts')
                                                        ->onDelete('cascade')
                                                        ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('comments');
        Schema::dropIfExists('comments');
    }
}
