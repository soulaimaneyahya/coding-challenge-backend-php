<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::TABLE, function (Blueprint $table) {
            $table->uuid(User::ID_COLUMN)->index()->primary();
            $table->string(User::NAME_COLUMN);
            $table->string(User::EMAIL_COLUMN)->unique();
            $table->timestamp(User::EMAIL_VERIFIED_AT_COLUMN)->nullable();
            $table->string(User::PASSWORD_COLUMN);
            $table->string(User::REMEMBER_TOKEN_COLUMN, 100)->nullable();
            $table->timestamp(User::CREATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(User::UPDATED_AT_COLUMN, 0)->nullable();
            $table->timestamp(User::DELETED_AT_COLUMN, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(User::TABLE);
    }
};
