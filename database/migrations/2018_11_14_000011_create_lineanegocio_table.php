<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineanegocioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'lineanegocio';

    /**
     * Run the migrations.
     * @table lineanegocio
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('linNegID');
            $table->string('linNegNombre', 45)->nullable()->default(null);
            $table->string('linNegCod', 45)->nullable()->default(null);
            $table->string('linNegUsuario', 45)->nullable()->default(null);
            $table->tinyInteger('linNegEstado')->nullable()->default('1');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
