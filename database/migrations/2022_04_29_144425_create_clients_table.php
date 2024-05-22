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
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_child_fio')->nullable();
            $table->date('client_child_birth')->nullable();
            $table->string('client_parent_fio')->nullable();
            $table->char('client_parent_phone', 20)->nullable();
            $table->string('client_parent_email')->nullable()->unique();
            $table->decimal('client_parent_amount', $precision = 8, $scale = 2)->nullable()->default(0);
            $table->timestamps($precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
