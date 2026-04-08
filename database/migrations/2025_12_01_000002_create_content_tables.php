<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vacancies', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department')->index();
            $table->string('location')->nullable();
            $table->string('type')->index();
            $table->longText('description_html');
            $table->text('requirements')->nullable();
            $table->json('attachments_json')->nullable();
            $table->string('application_url')->nullable();
            $table->string('status')->default('draft')->index();
            $table->timestamp('publish_at')->nullable()->index();
            $table->timestamp('expire_at')->nullable()->index();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('bills', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('bill_number')->index();
            $table->text('summary')->nullable();
            $table->longText('content_html');
            $table->json('attachments_json')->nullable();
            $table->date('effective_date')->nullable()->index();
            $table->string('status')->default('draft')->index();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('news_articles', function (Blueprint $table): void {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->longText('content_html');
            $table->unsignedBigInteger('category_id')->nullable()->index();
            $table->json('tags_json')->nullable();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('publish_at')->nullable()->index();
            $table->string('status')->default('draft')->index();
            $table->timestamps();
        });

        Schema::create('media', function (Blueprint $table): void {
            $table->id();
            $table->string('filename');
            $table->string('path');
            $table->string('mime', 120);
            $table->unsignedBigInteger('size');
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('activity_logs', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action');
            $table->string('target_type');
            $table->unsignedBigInteger('target_id')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        Schema::create('views', function (Blueprint $table): void {
            $table->id();
            $table->string('content_type')->index();
            $table->unsignedBigInteger('content_id')->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('views');
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('media');
        Schema::dropIfExists('news_articles');
        Schema::dropIfExists('bills');
        Schema::dropIfExists('vacancies');
    }
};
