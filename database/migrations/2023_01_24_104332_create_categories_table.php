<?php

use App\Models\Category;
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
        Schema::create(Category::TABLE, function (Blueprint $table) {
            $table->uuid(Category::ID_COLUMN)->index()->primary();
            $table->string(Category::NAME_COLUMN, 255)->index();
            $table->timestamp(Category::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Category::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(Category::DELETED_AT_COLUMN, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Category::TABLE);
    }
};
