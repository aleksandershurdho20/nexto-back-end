<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PostInsights;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_dislikes', function (Blueprint $table) {
            $table->id();
            $table->integer("dislikes")->default(0);
            $table->foreignIdFor(PostInsights::class)  
            ->cascadeOnDelete();
            $table->foreignIdFor(User::class);
            $table->timestamps();
            $table->unique(['post_insights_id', 'user_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_dislikes');
    }
};
