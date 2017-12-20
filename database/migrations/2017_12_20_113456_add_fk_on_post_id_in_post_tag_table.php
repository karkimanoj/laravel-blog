<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkOnPostIdInPostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::table('post_tag', function (Blueprint $table) {
            $table->foreign('post_id','fk_of_id_posts')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');

             $table->foreign('tag_id','fk_of_id_tags')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
             /* here to define 2 fks on same table or to define fk on table1 referencing to other table2 which has fk that references to again another table3 , name the fk constraint manually like above. inside foreign('column_name','constraint_name');*/
         });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign(['post_id','tag_id']);
    
        });
    }
}
