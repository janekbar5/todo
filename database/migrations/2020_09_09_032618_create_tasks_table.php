<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('priority_id')->unsigned()->nullable(); //unsigned only positive val
            $table->foreign('priority_id')->references('id')->on('priorities')->onDelete('cascade');
            $table->string('name');           
            $table->timestamps();
        });

         Schema::create('task_user', function (Blueprint $table) {           
            //$table->increments('id'); if on error Multiple primary key defined    
            $table->integer('task_id')->unsigned(); //unsigned only positive val
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

            $table->primary(['task_id','user_id']); //prevent repeating (1,1  1,2  1,3  1,1)
            
            $table->integer('user_id')->unsigned();                                         
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');     
            
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
        Schema::dropIfExists('tasks');
        
    }
}
