<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bikes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('manufacturer')->comment('メーカー');
            $table->string('engine_displacement')->comment('排気量');
            $table->string('type')->comment('車種');
            $table->string('model_year')->comment('年式');
            $table->string('image_path')->nullable();
            $table->boolean('delete_flag')->nullable();
            $table->dateTime('deleted_at')->nullable();
            //固定費
            $table->integer('light_vehicle_tax')->nullable()->comment('軽自動車税');
            $table->integer('weight_tax')->nullable()->comment('重量税');
            $table->integer('liability_insurance')->nullable()->comment('自賠責保険');
            //変動日
            $table->integer('voluntary_insurance')->nullable()->comment('任意保険');
            $table->integer('vehicle_inspection')->nullable()->comment('車検');
            $table->integer('parking_fee')->nullable()->comment('駐車場代');
            $table->integer('consumables')->nullable()->comment('消耗品日');
            //下は右と同じ意味：$table->timestamp('created_at')->nullable();,$table->timestamp('updated_at')->nullable();
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
        Schema::dropIfExists('bikes');
    }
}
