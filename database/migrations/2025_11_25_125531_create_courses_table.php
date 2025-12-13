<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
Schema::create('courses', function (Blueprint $table) {
$table->id();

$table->string('title');
$table->string('slug')->unique();
$table->string('image')->nullable();
            // links buat taro link youtube ke dalem materials (kalo mau tambahin copas link youtube trus ganti watch?=v di linknya jadi embed)
            $table->string('links')->nullable();
$table->text('description');
$table->decimal('price', 12, 2);
$table->decimal('rating', 3, 1)->default(0.0);

$table->timestamps();
});
}


public function down(): void
{
Schema::dropIfExists('courses');
}
};