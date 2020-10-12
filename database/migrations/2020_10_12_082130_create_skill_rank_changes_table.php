<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillRankChangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_rank_changes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->integer("role");
            $table->integer("from_sr");
            $table->integer("to_sr");
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
        Schema::dropIfExists('skill_rank_changes');
    }
}
