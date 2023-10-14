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
            $table->string('thumnail_image')->nullable();//add
            $table->string('upload_file')->nullable();//add
            $table->foreignId('category_id')->constrained((new Category())->getTable());//add
            $table->string('name');//add
            $table->string('slug');//add
            $table->double('price')->default(0.0);//add
            $table->double('discount')->default(0.0);
            $table->text('description')->nullable();
            $table->text('tags')->nullable(); //add
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->text('seo_title')->nullable();//add
            $table->text('seo_description')->nullable();//add
            $table->text('highlight')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
