<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'asignacion';

    /**
     * Run the migrations.
     * @table asignacion
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('asigID');
            $table->unsignedInteger('personas_PersonasID');
            $table->text('asigCodigo');
            $table->unsignedInteger('proyecto_ProyID');
            $table->unsignedInteger('factproyec_FactProyecID');
            $table->date('asigFechaIni')->nullable()->default(null);
            $table->double('asigPorcentaje')->nullable()->default('1.00');
            $table->string('asigFechaFin', 45)->nullable()->default(null);
            $table->text('asigObservaciones')->nullable()->default(null);
            $table->string('asignacionUbicacion', 45)->nullable()->default(null);
            $table->string('asig_Usuario', 45)->nullable()->default(null);
            $table->tinyInteger('asig_estado')->nullable()->default('1');
            $table->date('asigFecha')->nullable()->default(null);

            $table->index(["proyecto_ProyID"], 'fk_asignacion_proyecto1_idx');

            $table->index(["personas_PersonasID"], 'fk_asignacion_personas1_idx');

            $table->index(["factproyec_FactProyecID"], 'fk_asignacion_factproyec1_idx');
            $table->nullableTimestamps();


            $table->foreign('factproyec_FactProyecID', 'fk_asignacion_factproyec1_idx')
                ->references('FactProyecID')->on('factproyec')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('personas_PersonasID', 'fk_asignacion_personas1_idx')
                ->references('PersonasID')->on('personas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('proyecto_ProyID', 'fk_asignacion_proyecto1_idx')
                ->references('ProyID')->on('proyecto')
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
