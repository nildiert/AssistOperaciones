<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerscontrTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'perscontr';

    /**
     * Run the migrations.
     * @table perscontr
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('PersContrID');
            $table->unsignedInteger('Personas_PersonasID');
            $table->unsignedInteger('Contratos_ContId');
            $table->date('PersContrFechaInicio')->nullable()->default(null);
            $table->date('PersContrFechaFin')->nullable()->default(null);
            $table->string('PersContrUsuario', 45)->nullable()->default(null);
            $table->tinyInteger('PersContrEstado')->nullable()->default('1');

            $table->index(["Personas_PersonasID"], 'fk_Personas_has_Contratos_Personas1_idx');

            $table->index(["Contratos_ContId"], 'fk_Personas_has_Contratos_Contratos1_idx');
            $table->nullableTimestamps();


            $table->foreign('Contratos_ContId', 'fk_Personas_has_Contratos_Contratos1_idx')
                ->references('ContId')->on('contratos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Personas_PersonasID', 'fk_Personas_has_Contratos_Personas1_idx')
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
