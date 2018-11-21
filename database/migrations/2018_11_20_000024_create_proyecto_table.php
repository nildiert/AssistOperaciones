<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'proyecto';

    /**
     * Run the migrations.
     * @table proyecto
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('cliente_cliID');
            $table->string('ProyectoNombre', 45)->nullable()->default(null);
            $table->date('ProyFechaIni')->nullable()->default(null);
            $table->date('ProyectoFechaFin')->nullable()->default(null);
            $table->double('ProyectoPresupuesto')->nullable()->default(null);
            $table->string('Proyecto_Usuario', 45)->nullable()->default(null);
            $table->tinyInteger('ProyectoEstado')->nullable()->default('1');
            $table->longText('ProyectoDescripcion')->nullable()->default(null);

            $table->index(["cliente_cliID"], 'fk_Proyecto_cliente1_idx');
            $table->nullableTimestamps();


            $table->foreign('cliente_cliID', 'fk_Proyecto_cliente1_idx')
                ->references('cliID')->on('cliente')
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
