<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactproyecTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'factproyec';

    /**
     * Run the migrations.
     * @table factproyec
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('FactProyecID');
            $table->string('FactProyecTipo', 45)->nullable()->default(null)->comment('El tipo de facturacion puede ser una orden de compra o un contrato\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\n');
            $table->string('FactProyecCodigo', 10)->nullable()->default(null);
            $table->date('FactProyecFechaIni')->nullable()->default(null);
            $table->date('FactProyecFechaFin')->nullable()->default(null);
            $table->string('FactProyec_Usuario', 45)->nullable()->default(null);
            $table->tinyInteger('FactProyec_Estado')->nullable()->default('1');
            $table->unsignedInteger('proyecto_id');

            $table->index(["proyecto_id"], 'fk_factproyec_proyecto1_idx');
            $table->nullableTimestamps();


            $table->foreign('proyecto_id', 'fk_factproyec_proyecto1_idx')
                ->references('id')->on('proyecto')
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
