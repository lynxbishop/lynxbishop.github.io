<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pos;

class CreatePos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $this->postCreate([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pos');
    }


    private function postCreate(array $items)  {
        foreach ($items as $item) {
            $model = new Pos();
            $model->setAttribute('name', $item);
            $model->save();
        }
    }

}
