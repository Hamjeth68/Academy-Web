<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pages');
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('page_id');
            $table->string('page_name', 50);
            $table->enum('page_type', ['default', 'course', 'blog']);
            $table->string('slug', 50)->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('content')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
