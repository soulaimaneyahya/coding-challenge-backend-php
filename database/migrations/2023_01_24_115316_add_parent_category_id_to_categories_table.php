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
        Schema::table(Category::TABLE, function (Blueprint $table) {
            $table->foreignUuid(Category::PARENT_CATEGORY_ID_COLUMN)
                ->nullable()
                ->constrained()
                ->on(Category::TABLE)
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Category::TABLE, function (Blueprint $table) {
            $table->dropForeign([Category::PARENT_CATEGORY_ID_COLUMN]);
            $table->dropColumn(Category::PARENT_CATEGORY_ID_COLUMN);
        });
    }
};
