<?php

use App\Models\Product;
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
        Schema::create(Product::TABLE, function (Blueprint $table) {
            $table->uuid(Product::ID_COLUMN)->index()->primary();
            $table->string(Product::NAME_COLUMN, 255);
            $table->string(Product::DESCRIPTION_COLUMN, 700);
            // Decimal for price, allowing for precision
            $table->decimal(Product::PRICE_COLUMN, 10, 4);
            $table->timestamp(Product::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Product::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Product::DELETED_AT_COLUMN, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Product::TABLE);
    }
};
