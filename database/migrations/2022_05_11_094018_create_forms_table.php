<?php

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
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string("lastName");
            $table->string("firstName");
            $table->string("birthdate")->nullable();
            $table->string("birthPlace")->nullable();
            $table->string("address")->nullable();
            $table->string("email")->unique();
            $table->string("phone");
            $table->string("studyLevel")->nullable();
            $table->string("serie")->nullable();
            $table->string("englishLevel")->nullable();
            $table->string("training")->nullable();
            $table->string("job_status")->nullable();
            $table->string("enterprise")->nullable();
            $table->string("piece_no")->nullable();
            $table->string("piece_photo")->nullable();
            $table->string("id_type")->nullable();
            $table->string("doc_bac")->nullable();
            $table->string("other_doc")->nullable();
            $table->string("resume")->nullable();
            $table->string("mention_bac")->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('forms');
    }
};
