<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string("reference");
            $table->string("name");
            $table->string("description");
            $table->integer("price");
            $table->integer("nbItems")->default(0);
            $table->string("status")->default("Available");
            $table->foreignId("user_id")
                  ->references("id")
                  ->on("users")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreignId("service_id")
                        ->references("id")
                        ->on("services")
                        ->onDelete("cascade")
                        ->onUpdate("cascade");
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
        Schema::dropIfExists('materials');
    }
}
