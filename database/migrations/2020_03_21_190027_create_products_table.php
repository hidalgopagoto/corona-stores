<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("products", function(Blueprint $table) {
            $table->increments("id");
            $table->integer("id_category")->unsigned();
            $table->string("name");
            $table->text("description")->nullable();
            $table->integer("order")->default(1);
            $table->string("image")->nullable();
            $table->decimal("price", 10, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("products");
    }
}
