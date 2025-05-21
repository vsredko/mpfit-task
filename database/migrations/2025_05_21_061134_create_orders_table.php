<?php

use App\Models\Product;
use App\Models\Status;
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
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->foreignIdFor(Status::class)
                ->default(DB::table('statuses')->where('name', 'Новый')->value('id'))
                ->constrained();
            $table->foreignIdFor(Product::class)->constrained();
            $table->integer('quantity');
            $table->decimal('total_price');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
    Schema::dropIfExists('orders');
}
};
