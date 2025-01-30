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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('user_id',11);
            $table->string('job_name',50)->nullable();
            $table->string('no_of_vacancy',5)->nullable();
            $table->text('job_description',255)->nullable();
            $table->string('key_skills',255)->nullable();
            $table->string('location',150)->nullable();
            $table->string('type_of_job',10)->nullable();
            $table->string('salary_to',10)->nullable();
            $table->string('salary_from',10)->nullable();
            $table->string('qualification',50)->nullable();
            $table->string('indroduction_pdf',255)->nullable();
            $table->enum('status', ['0', '1'])->default('1')->comment = '0 = Inactive, 1 = active';
            $table->timestamps();
            $table->softDeletes();
            
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
};
