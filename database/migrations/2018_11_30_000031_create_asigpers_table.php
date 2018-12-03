<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsigpersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'asigpers';

    /**
     * Run the migrations.
     * @table asigpers
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('asignacion_asigID');
            $table->unsignedInteger('personas_PersonasID');
            $table->date('fechaInicio')->nullable();
            $table->date('fechaFin')->nullable();
            $table->text('observaciones')->nullable();
            $table->string('ubicacion', 45)->nullable();
            $table->tinyInteger('estado')->nullable()->default('1');

            $table->index(["asignacion_asigID"], 'fk_asigpers_asignacion1_idx');

            $table->index(["personas_PersonasID"], 'fk_asigpers_personas1_idx');
            $table->nullableTimestamps();


            $table->foreign('asignacion_asigID', 'fk_asigpers_asignacion1_idx')
                ->references('asigID')->on('asignacion')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('personas_PersonasID', 'fk_asigpers_personas1_idx')
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
