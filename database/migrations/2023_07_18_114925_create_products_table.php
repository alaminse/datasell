<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('thumnail_image')->nullable();
            $table->string('upload_file')->nullable();
            $table->foreignId('category_id')->constrained((new Category())->getTable());
            $table->string('name');
            $table->string('slug');
            $table->double('price')->default(0.0);
            $table->double('discount')->default(0.0);
            $table->text('description')->nullable();
            $table->text('tags')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('highlight')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
