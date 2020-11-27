<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToEdithistorys1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('edithistorys', function (Blueprint $table) {
            //
            $table->string('title')->comment('タイトル');
            $table->string('text')->comment('編集内容');
            $table->string('edited_at')->comment('サイト編集日');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('edithistorys', function (Blueprint $table) {
            //
        });
    }
}
