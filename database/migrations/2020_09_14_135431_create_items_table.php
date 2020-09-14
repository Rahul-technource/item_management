<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->enum('is_selected', ['0', '1'])->comment('0= Not Selected 1=Selected')->default(0);
            $table->dateTime('created_date', 0);
            $table->timestamp('updated_date', 0);
            $table->bigInteger('created_by', 0);
            $table->bigInteger('updated_by', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
