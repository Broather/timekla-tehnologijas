<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('books', function (Blueprint $table) {
        $table->id();

        $table->foreignId('idauthor');
        $table->foreignId('idgenre');
        $table->string('name', 256);
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2)->nullable();
        $table->integer('year');
        $table->string('image', 256)->nullable();
        $table->boolean('display');

        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
    });
    }
   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
