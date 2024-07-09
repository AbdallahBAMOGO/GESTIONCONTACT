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
        Schema::create('table_groupe', function (Blueprint $table) {
            $table->id();
            $table->string("libelle");
            $table->integer("user_id")->default("1");
            //$table->foreign("user_id")->references("id")->on("table_user")->onDelete("restrict")
            //->onUpdate("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_groupe');
    }
};
