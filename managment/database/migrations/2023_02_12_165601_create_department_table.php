<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

 // Insert some department
 DB::table('department')->insert(
    array(
        [
            'name' => 'HR',
        ],
        [
            'name' => 'IT',
        ],
        [
            'name' => 'Marketing',
        ],

    )
);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department');
    }
}
