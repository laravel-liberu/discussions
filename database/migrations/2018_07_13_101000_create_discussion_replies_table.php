<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('discussion_replies', function (Blueprint $table) {
            $table->id();

            $table->foreignId('discussion_id')->constrained()->index('discussion_id')
                ->name('discussion_replies_discussion_id_foreign');

            $table->text('body');

            $table->foreignId('created_by')->nullable()->constrained('users')->index()->name('comments_created_by_foreign');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discussion_replies');
    }
}
