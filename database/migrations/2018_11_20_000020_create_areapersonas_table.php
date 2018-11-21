<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreapersonasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'areapersonas';

    /**
     * Run the migrations.
     * @table areapersonas
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('arPerId');
            $table->unsignedInteger('area_AreID');
            $table->unsignedInteger('personas_PersonasID');
            $table->string('arPerUsuario', 45)->nullable()->default(null);
            $table->tinyInteger('arPersEstado')->nullable()->default('1');

            $table->index(["personas_PersonasID"], 'fk_areaPersonas_personas1_idx');

            $table->index(["area_AreID"], 'fk_areaPersonas_area1_idx');
            $table->nullableTimestamps();


            $table->foreign('area_AreID', 'fk_areaPersonas_area1_idx')
                ->references('AreID')->on('area')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('personas_PersonasID', 'fk_areaPersonas_personas1_idx')
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
