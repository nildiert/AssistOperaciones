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
            $table->unsignedInteger('Proyecto_ProyID')->unsigned();
            $table->string('FactProyecTipo', 45)->nullable()->default(null)->comment('El tipo de facturacion puede ser una orden de compra o un contrato\\\\r\\\\n');
            $table->date('FactProyecFechaIni')->nullable()->default(null);
            $table->date('FactProyecFechaFin')->nullable()->default(null);
            $table->timestamp('FactProyec_created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('FactProyec_updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('FactProyec_Usuario', 45)->nullable()->default(null);
            $table->tinyInteger('FactProyec_Estado')->nullable()->default('1');

            $table->index(["Proyecto_ProyID"], 'fk_FactProyec_Proyecto1_idx');


            $table->foreign('Proyecto_ProyID', 'fk_FactProyec_Proyecto1_idx')
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
