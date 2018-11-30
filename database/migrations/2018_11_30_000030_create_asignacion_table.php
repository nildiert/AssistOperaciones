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
            $table->text('asigCodigo');
            $table->string('asig_Usuario', 45)->nullable()->default(null);
            $table->unsignedInteger('factproyec_FactProyecID');
            $table->tinyInteger('asig_estado')->nullable()->default('1');

            $table->index(["factproyec_FactProyecID"], 'fk_asignacion_factproyec1_idx');
            $table->nullableTimestamps();


            $table->foreign('factproyec_FactProyecID', 'fk_asignacion_factproyec1_idx')
                ->references('FactProyecID')->on('factproyec')
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
