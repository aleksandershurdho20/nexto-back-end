<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;
use App\Models\Comment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class)  
            ->constrained()              
            ->cascadeOnDelete(); 
            $table->foreignIdFor(Comment::class)  
            ->constrained()              
            ->cascadeOnDelete(); 
            $table->timestamps();
            $table->text("content");    
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
