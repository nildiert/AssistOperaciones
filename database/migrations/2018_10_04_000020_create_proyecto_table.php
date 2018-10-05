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
            $table->increments('ProyID');
            $table->unsignedInteger('cliente_cliID')->unsigned();
            $table->string('ProyectoNombre', 45)->nullable();
            $table->date('ProyFechaIni')->nullable()->default(null);
            $table->date('ProyectoFechaFin')->nullable()->default(null);
            $table->decimal('ProyectoPresupuesto', 8, 2)->nullable()->default(null);
            $table->timestamp('Proyecto_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('Proyecto_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('Proyecto_Usuario', 45)->nullable()->default(null);
            $table->tinyInteger('ProyectoEstado')->nullable()->default(null);
            $table->longText('ProyectoDescripcion')->nullable();

            $table->index(["cliente_cliID"], 'fk_Proyecto_cliente1_idx');


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
