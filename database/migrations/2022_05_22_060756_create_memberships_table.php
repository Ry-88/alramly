<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('birth_date');
            $table->string('membership_type');
            $table->string('job');
            $table->string('city');
            $table->date('approved_at')->nullable();
            $table->date('expirted_at')->nullable();
            $table->text('reason_refuse')->nullable();
            $table->enum('status', ['في الانتظار', 'تمت الموافقه', 'مرفوض'])->default('في الانتظار');
            $table->enum('membership_card', ['yes', 'no'])->default('no');
            $table->string('image_extension')->nullable();
            $table->integer('membership_no')->nullable();
            $table->string('hasEdit')->nullable();
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
        Schema::dropIfExists('memberships');
    }
};
