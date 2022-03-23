<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Item;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_pos_id')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        $this->postCreate(['Dropee.com', 'B2B Marketplace', 'SaaS enabled marketplace', 'Provide Transparency', 'Build Trust']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }


    private function postCreate(array $items)  {
        foreach ($items as $item) {
            $model = new Item();
            $model->setAttribute('name', $item);
            $model->save();
        }
    }

}
