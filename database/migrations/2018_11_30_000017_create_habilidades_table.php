<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'habilidades';

    /**
     * Run the migrations.
     * @table habilidades
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('HabilidadesID');
            $table->string('HabilidadesNombre', 80)->nullable()->default(null);
            $table->string('HabilidadesTipo', 45)->nullable()->default(null);
            $table->string('HabilidadesUsuario', 45)->nullable()->default(null);
            $table->tinyInteger('HabilidadesEstado')->nullable()->default('1');
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
