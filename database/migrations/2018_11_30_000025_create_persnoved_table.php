<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersnovedTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'persnoved';

    /**
     * Run the migrations.
     * @table persnoved
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('PersNovedID');
            $table->unsignedInteger('Novedades_NovId');
            $table->unsignedInteger('personas_PersonasID');
            $table->date('PersNovedFechaInicio')->nullable()->default(null);
            $table->date('PersNovedFechaFin')->nullable()->default(null);
            $table->tinyInteger('PersNovedEstado')->nullable()->default('1');
            $table->string('PersNovedUsuario', 45)->nullable()->default('1');

            $table->index(["personas_PersonasID"], 'fk_persnoved_personas1_idx');

            $table->index(["Novedades_NovId"], 'fk_Personas_has_Novedades_Novedades1_idx');
            $table->nullableTimestamps();


            $table->foreign('Novedades_NovId', 'fk_Personas_has_Novedades_Novedades1_idx')
                ->references('NovId')->on('novedades')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('personas_PersonasID', 'fk_persnoved_personas1_idx')
                ->references('PersonasID')->on('personas')
                ->onDelete('no action')
                ->onUpdate('no action');
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
