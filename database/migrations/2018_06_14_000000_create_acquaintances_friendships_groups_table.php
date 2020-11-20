<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateFriendshipsGroupsTable
 */
class CreateAcquaintancesFriendshipsGroupsTable extends Migration
{

    public function up()
    {

        Schema::create(config('acquaintances.tables.friendship_groups'), function (Blueprint $table) {

            $table->integer('friendship_id')->unsigned();
            $table->morphs('friend');
            $table->integer('group_id')->unsigned();

            $table->foreign('friendship_id')
                  ->references('id')
                  ->on(config('acquaintances.tables.friendships'))
                  ->onDelete('cascade');

            $table->unique(['friendship_id', 'friend_id', 'friend_type', 'group_id'], 'unique');

        });

    }

    public function down()
    {
        Schema::dropIfExists(config('acquaintances.tables.friendship_groups'));
    }

}
