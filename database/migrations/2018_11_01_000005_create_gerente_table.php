<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGerenteTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'gerente';

    /**
     * Run the migrations.
     * @table gerente
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('GerenteID');
            $table->string('GerenteNombre', 45)->nullable()->default(null);
            $table->date('GerenteFechaInicio')->nullable()->default(null);
            $table->date('GerenteFechaFin')->nullable()->default(null);
            $table->string('Gerente_Usuario', 45)->nullable()->default(null);
            $table->tinyInteger('Gerente_estado')->nullable()->default('1');
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
