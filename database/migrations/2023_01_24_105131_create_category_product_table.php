<?php

use App\Models\CategoryProduct;
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
        Schema::create(CategoryProduct::TABLE, function (Blueprint $table) {
            $table->id();
            $table->foreignUuid(CategoryProduct::CATEGORY_ID_COLUMN)->constrained();
            $table->foreignUuid(CategoryProduct::PRODUCT_ID_COLUMN)->constrained();
            $table->timestamp(CategoryProduct::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(CategoryProduct::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(CategoryProduct::DELETED_AT_COLUMN, 0)->nullable();

            $table->unique([CategoryProduct::CATEGORY_ID_COLUMN, CategoryProduct::PRODUCT_ID_COLUMN]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(CategoryProduct::TABLE);
    }
};
