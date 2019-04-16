<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('location')->nullable()->after('image');
            $table->string('city')->nullable()->after('image');
            $table->string('state')->nullable()->after('image');
            $table->string('company')->nullable()->after('image');
            $table->string('twitter')->nullable()->after('location');
            $table->string('facebook')->nullable()->after('twitter');
            $table->string('stackoverflow')->nullable()->after('facebook');
            $table->string('github')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('company');
            $table->dropColumn('twitter');
            $table->dropColumn('facebook');
            $table->dropColumn('stackoverflow');
            $table->dropColumn('github');
        });
    }
}
