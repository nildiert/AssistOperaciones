<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGerenproyecTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'gerenproyec';

    /**
     * Run the migrations.
     * @table gerenproyec
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('GerenProyecID');
            $table->unsignedInteger('Gerente_GerenteID');
            $table->unsignedInteger('Proyecto_ProyID');
            $table->date('GerenProyecFechaInic')->nullable()->default(null);
            $table->date('GerenProyecFechaFin')->nullable()->default(null);
            $table->string('GerenProyec_Usuario', 45)->nullable()->default(null);
            $table->tinyInteger('GerenProyec_Estado')->nullable()->default('1');

            $table->index(["Proyecto_ProyID"], 'fk_GerenProyec_Proyecto1_idx');

            $table->index(["Gerente_GerenteID"], 'fk_GerenProyec_Gerente1_idx');
            $table->nullableTimestamps();


            $table->foreign('Gerente_GerenteID', 'fk_GerenProyec_Gerente1_idx')
                ->references('GerenteID')->on('gerente')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Proyecto_ProyID', 'fk_GerenProyec_Proyecto1_idx')
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
