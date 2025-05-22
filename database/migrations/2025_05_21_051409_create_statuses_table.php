<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });

        DB::table('statuses')->insert([
            [
                'name' => 'Новый',
            ],
            [
                'name' => 'В процессе',
            ],
            [
                'name' => 'Завершен',
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
